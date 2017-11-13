<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
        parent::__construct();
		    $this->load->model('Eyemarket_model');
		    $this->load->model('Home_model');
			date_default_timezone_set('Asia/Jakarta');
			/* $config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'admin@eyesoccer.id',
				'smtp_pass' => '12345678',
				'mailtype'  => 'html', 
				'charset'   => 'iso-8859-1'
			);
			$this->load->library('email', $config); */
			// $this->load->library('email');
			$this->load->library("PHPMailer_Library");
    }
	public function index()
	{	
		$objMail = $this->phpmailer_library->load();
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";

		$data['jadwal'] 			= $this->Home_model->get_all_jadwal();
		$data['trend_eyetube'] 		= $this->Home_model->get_trending_eyetube();
		$data['trend_eyenews'] 		= $this->Home_model->get_trending_eyenews();
		$data['profile_club'] 		= $this->Home_model->get_profile_club();
		$data['profile_player']	 	= $this->Home_model->get_player_random();
		$data['video_eyetube'] 		= $this->Home_model->get_eyetube_satu();
		$data['eyetube_science'] 	= $this->Home_model->get_eyetube_science();
		$data['eyetube_stars'] 		= $this->Home_model->get_eyetube_stars();
		$data['eyetube_kamu'] 		= $this->Home_model->get_eyetube_kamu();
		$data['eyetube_kamu'] 		= $this->Home_model->get_eyetube_kamu();
		$data['eyenews_main'] 		= $this->Home_model->get_eyenews_main();

		$news_type 					= $data['eyenews_main']->news_type;
		$data['eyenews_similar'] 	= $this->Home_model->get_eyenews_similar($news_type);
		$data['eyenews_muda'] 		= $this->Home_model->get_eyenews_muda();
		$data['eyevent_today'] 		= $this->Home_model->get_jadwal_today();
		$data['eyevent_yesterday'] 	= $this->Home_model->get_jadwal_yesterday();
		$data['eyevent_tomorrow'] 	= $this->Home_model->get_jadwal_tomorrow();
		
		$cmd_ads=$this->db->query("select * from tbl_ads")->result_array();
		$i=0;
		foreach($cmd_ads as $ads){
		$e=0;
		foreach($ads as $key => $val)
		{
		$array[$i][$e] =  $val;
		$e++;
		}		
		$i++;
		}
		$data["array"]=$array;
		$data["page"]="home";
		$data["objMail"]=$objMail;
		$data["popup"]=$array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		$data["body"]=$this->load->view('home/index2', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	
	public function tentang_kami()
	{	
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		
		$cmd_ads=$this->db->query("select * from tbl_ads")->result_array();
		$i=0;
		foreach($cmd_ads as $ads){
		$e=0;
		foreach($ads as $key => $val)
		{
		$array[$i][$e] =  $val;
		$e++;
		}		
		$i++;
		}
		$data["array"]=$array;
		$data["page"]="home";
		$data["popup"]=$array[14][3];
		//$data["body"]=$this->load->view('home/index', '', true);
		$data["body"]=$this->load->view('home/tentang', $data, true);
		//$this->load->view('template-front-end',$data);
		$this->load->view('template-baru',$data);
	}
	public function member_area(){
	$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		
		$cmd_ads=$this->db->query("select * from tbl_ads")->result_array();
		$i=0;
		foreach($cmd_ads as $ads){
		$e=0;
		foreach($ads as $key => $val)
		{
		$array[$i][$e] =  $val;
		$e++;
		}		
		$i++;
		}
		$data["array"]=$array;
		$data["page"]="home";

		$data["popup"]=$array[14][3];
		if(isset($_SESSION["member_id"])){
			$profile=$this->db->query("SELECT a.*,b.pic as profile_pics FROM tbl_member a LEFT JOIN tbl_gallery b ON b.id_gallery=a.profile_pic WHERE id_member='".$_SESSION["member_id"]."' LIMIT 1")->row_array();

			if(isset($profile["profile_pics"]) && $profile["profile_pics"]!="")
			{
			$data["pic"]=$profile["profile_pics"];
			}
			else{
			$data["pic"]="no-person.jpg";
			}
			// $data["query"]="SELECT a.*,b.pic as profile_pics FROM tbl_member a LEFT JOIN tbl_gallery b ON b.id_gallery=a.profile_pic WHERE id_member='".$_SESSION["member_id"]."' LIMIT 1";
			$data["profile"]=$profile;
			$data["extrascript"]=$this->load->view('home/script_member_area', $data, true);
			$data["body"]=$this->load->view('home/member-area', $data, true);
			//$this->load->view('template-front-end',$data);
			$this->load->view('template-baru',$data);
		}else{
			redirect("");
		}
	}
	
	public function logout(){
		unset($_SESSION["member_id"],$_SESSION["user_id"]);
				session_destroy();
				redirect("");
	}
	public function request_player(){
		$this->db->query("INSERT INTO tbl_member_player SET id_player='".$_POST["player_id"]."',id_member='".$_SESSION["member_id"]."', add_date='".date("Y-m-d H:i:s")."'");
		redirect("home/member_area");
		
	}
	
	public function profile_upload(){
		if($_FILES['pic']['size'] > 10485760){
			$return = 'File too large. Maximum file size is 1MB.';		
		}else{
			$return = 'Success.';
			$caption = "Profile Picture";
			$lat = $_POST['lat'];
			$lon = $_POST['lon'];
			$date =date("Y-m-d H:i:s");
			$pic="profile-".rand("1000","9999")."-".$_FILES['pic']['name'];
			$pic = preg_replace('/\s+/', '', $pic);
			move_uploaded_file($_FILES['pic']['tmp_name'], "systems/img_storage/".$pic);
				$last_id = $_SESSION["member_id"];
				// mysqli_query($con,"INSERT INTO tbl_gallery (title,tags,pic,thumb1,lat,lon,upload_date,publish_by,publish_type,upload_user) values ('".$caption."','profil','".$pic."','".$pic."','".$lat."','".$lon."','".$date."','member','public','".$last_id."')");
			$post_data = array(
				'title'            => $caption,
				'tags'   =>  'profil',
				'pic'   =>  $pic,
				'thumb1' => $pic,
				'lat'        =>  $lat,
				'lon'        =>  $lon,
				'upload_date'        =>  date("Y-m-d H:i:s"),
				'publish_by'        =>  'member',
				'publish_type'        =>  'public',
				'upload_user'        =>  $last_id
			);
			$cmd=$this->db->insert("tbl_gallery",$post_data);	
			$this->db->trans_complete();
			$pic_id = $this->db->insert_id();
			
			$this->db->query("UPDATE tbl_member SET profile_pic='".$pic_id."' WHERE id_member='".$_SESSION["member_id"]."'");
			if($this->db->affected_rows()>0){
				redirect("home/member_area");
			}else{
				echo "<script>alert('Data gagal di update');</script>";
			}
		}
	}
	
	public function profile_upload_data(){
		$post_data = array(
			'name'            => $_POST['name'],
			'fullname'            => $_POST['fullname'],
			'address'            => $_POST['address'],
			'about'            => $_POST['about']
		);
		$this->db->where('id_member', $_SESSION["member_id"]);
		$this->db->update('tbl_member', $post_data); 
		
		if($this->db->affected_rows()>0){
			redirect("home/member_area");
		}else{
			echo "<script>alert('Data gagal di update');</script>";
		}
	}
	
}
