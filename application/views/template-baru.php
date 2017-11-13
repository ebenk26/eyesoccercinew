<?php
if($_SERVER['SERVER_PORT'] !== 443 &&
   (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off')) {
  header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
  exit;
}
function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}


$_SESSION["ip"] = getUserIP();

$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$actual_link = "http://".$_SERVER["HTTP_HOST"].$uri_parts[0];
$device_detail=$_SERVER["HTTP_USER_AGENT"];
$_SESSION["device_detail"]=$_SERVER["HTTP_USER_AGENT"];

$_SESSION["device_detail"]="Dekstop";
function isMobile() {
    return preg_match("/(iPhone|iPod|iPad|Android|BlackBerry|android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
// If the user is on a mobile device, redirect them
if(isMobile()){
$_SESSION["device_detail"]="Mobile";
}
$cek=$this->db->query("SELECT * FROM tbl_analytic WHERE session_ip='".$_SESSION["ip"]."' AND url='".$actual_link."' AND date='".date("Y-m-d")."'")->num_rows();
if($cek<1)
{
	$this->db->query("INSERT INTO tbl_analytic SET session_ip='".$_SESSION["ip"]."',url='".$actual_link."',date='".date("Y-m-d")."',device='".$_SESSION["device_detail"]."',device_detail='".$device_detail."'");
}

$cmd_ads=$this->db->query("select * from tbl_ads");

foreach($cmd_ads->result_array() as $row_ads){
$array[] =  $row_ads; 
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
if(!isset($meta["share"]))
{
?>

<!-- Begin of SEO Meta Tags -->
<title>EyeSoccer: Portal Database & Berita Sepak Bola Terlengkap di Indonesia</title>
<meta name="title" content="EyeSoccer: Portal Database & Berita Sepak Bola Terlengkap di Indonesia" />
<meta name="description" content="Berita sepak bola terbaru, jadwal dan hasil pertandingan, live score, transfer, klasemen liga Indonesia dan dunia & profil pemain & klub dari seluruh Indonesia." />
<meta name="news_keywords" content="jadwal bola, berita bola, sepak bola, jadwal siaran bola, jadwal sepak bola, berita bola terkini, berita bola terbaru, berita sepak bola, info bola, berita bola hari ini, bola hari ini">
<meta name="googlebot-news" content="index,follow" />
<meta name="googlebot" content="index,follow" />
<meta name="robots" content="index,follow, noodp, noydir" />
<meta name="author" content="EyeSoccer.id" />
<meta name="language" content="id" />
<meta name="geo.country" content="id" name="geo.country" />
<meta http-equiv="content-language" content="In-Id" />
<meta name="geo.placename"content="Indonesia" />
<link rel="publisher" href="https://plus.google.com/u/1/105520415591265268244" />
<link rel="canonical" href="https://www.eyesoccer.id" />
<!-- End of SEO Meta Tags-->

<!-- Begin of Facebook Open graph data-->
<meta property="fb:app_id" content="140611863350583" />
<meta property="og:site_name" content="EyeSoccer" />
<meta property="og:url" content="https://www.eyesoccer.id" />
<meta property="og:type" content="Website" />
<meta property="og:title" content="EyeSoccer: Portal Database & Berita Sepak Bola Terlengkap di Indonesia" />
<meta property="og:description" content="Berita sepak bola terbaru, jadwal dan hasil pertandingan, live score, transfer, klasemen liga Indonesia dan dunia & profil pemain & klub dari seluruh Indonesia." />
<meta property="og:locale" content="id_ID" />
<meta property="og:image" content="<?=base_url()?>img/tab_icon.png" />
<!--End of Facebook open graph data-->
   
<!--begin of twitter card data-->
<meta name="twitter:card" content="summary" />    
<meta name="twitter:site" content="@eyesoccer_id" />
<meta name="twitter:creator" content="@eyesoccer_id" />
<meta name="twitter:domain" content="EyeSoccer"/>
<meta name="twitter:title" content="EyeSoccer: Portal Database & Berita Sepak Bola Terlengkap di Indonesia" />
<meta name="twitter:description" content="Berita sepak bola terbaru, jadwal dan hasil pertandingan, live score, transfer, klasemen liga Indonesia dan dunia & profil pemain & klub dari seluruh Indonesia." />
<meta name="twitter:image" content="<?=base_url()?>img/tab_icon.png" />
<!--end of twitter card data-->

<?php
}
else{
	echo $meta["share"];
}
?>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>bs/fa/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="<?=base_url()?>img/tab_icon.png">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>bs/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>bs/css/mycss.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>bs/css/soccer-field.css"><!--update rizki-->
<link rel="stylesheet" type="text/css" href="<?=base_url()?>bs/css/arf-styles.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>bs/css/owl.carousel.min.css ">
	<link rel="stylesheet" href="<?php echo base_url(); ?>bs/css/owl.theme.default.min.css ">
	<style type="text/css">
		.kontainer
		{
			max-width: 1080px;
				margin: 20px auto;
				background: #fff;
				overflow: hidden;
				padding: 10px;
		}
		@font-face
		{
        	font-family: "Montserrat";
        	src: url('../assets/new_assets/montserrat/Montserrat-Regular.otf');
	    }
		@font-face
		{
        	font-family: "Montserratbold";
        	src: url('../assets/new_assets/montserrat/Montserrat-Bold.otf');
	    }
		body
		{
			font-family: Montserrat;
		}
		a, a:link, a:hover
		{
			color: unset;
			text-decoration: unset;	
		}
		li
		{
			list-style-type: none;
		}
		.lingkup-box
		{
			padding: 0px;
			width: 184px;
		}
		.box-jadwal
		{
			float: left;
			/*width: 105%;*/
		}

		.arrow-box-jadwal
		{
			position: relative;
			z-index: 1;
			cursor: pointer;
			/*height: 60px;*/
		}

		.isi-box-jadwal
		{
			position: absolute;
			top: 1px;
			z-index: 2;
			padding: 2px;
			width: 184px;
			height: 68px;
			/*font-size: 10px;*/
		}

		.time-box-jadwal
		{
			padding-bottom: 12%;
			font-size: 10px;
		}

		.club-box-jadwal
		{
			font-size: 12px;
			padding-bottom: 2px;
		}

		.score-box-jadwal
		{
			float: right;
		}
		.btn-trending-hijau
		{
			color: #fff;
		    background-color: #62a555;
		    /* border-color: #0a0a0a; */
		    border-radius: unset;
		    /* height: 52%; */
		    padding: 5px 16px;
		    border: unset;
		}
		.tag-trending
		{
			border-radius: 20px;
		    font-size: 10px;
		    padding: 5px 18px;
		    border: unset;
		    background-color: #f5f5f5;
		    color: #62a555;
		}
		.tag-trending:hover
		{
			color: white;
		}
		.keterangan-club
		{
			text-align: left;
			font-size: 12px;
			color: #615d5d;
			padding-top: 13px;
		}
		.box-ket-player
		{
			font-size: 12px;
		}
		.news-main-title
		{
			position: absolute;
		    top: 368px;
		    left: 2%;
		    color: #ffffff
		}
		/* Flashing */
		.hover13 figure:hover img {
			opacity: 1;
			-webkit-animation: flash 1.5s;
			animation: flash 1.5s;
		}
		@-webkit-keyframes flash {
			0% {
				opacity: .4;
			}
			100% {
				opacity: 1;
			}
		}
		@keyframes flash {
			0% {
				opacity: .4;
			}
			100% {
				opacity: 1;
			}
		}
		/* Shine */
		.hover14 figure {
			position: relative;
		}
		.hover14 figure::before {
			position: absolute;
			top: 0;
			left: -75%;
			z-index: 2;
			display: block;
			content: '';
			width: 50%;
			height: 100%;
			background: -webkit-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255,255,255,.3) 100%);
			background: linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,.3) 100%);
			-webkit-transform: skewX(-25deg);
			transform: skewX(-25deg);
		}
		.hover14 figure:hover::before {
			-webkit-animation: shine .75s;
			animation: shine .75s;
		}
		@-webkit-keyframes shine {
			100% {
				left: 125%;
			}
		}
		@keyframes shine {
			100% {
				left: 125%;
			}
		}


		body{
    background: #fff;
	}
	.navbar, .dropdown-menu{
	background:#f9c241;
	border: none;

	}
	.nav>li>a, .dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover, .dropdown-menu>li>a, .dropdown-menu>li{
	  border-bottom: 3px solid transparent;
	}
	.nav>li>a:focus, .nav>li>a:hover,.nav .open>a, .nav .open>a:focus, .nav .open>a:hover, .dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover{
	  border-bottom: 3px solid transparent;
	  background: rgba(154, 154, 154, 0.27);
	}
	.navbar a, .dropdown-menu>li>a, .dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover, .navbar-toggle{
	 color: #9b7a2a;
	}
	.dropdown-menu{
		  -webkit-box-shadow: none;
		box-shadow:none;
	}

	.nav li:hover:nth-child(8n+1), .nav li.active:nth-child(8n+1){
	  border-bottom: #9b7a2a 2px solid;
	}
	.nav li:hover:nth-child(8n+2), .nav li.active:nth-child(8n+2){
	  border-bottom: #9b7a2a 2px solid;
	}
	.nav li:hover:nth-child(8n+3), .nav li.active:nth-child(8n+3){
	  border-bottom: #9b7a2a 2px solid;
	}
	.nav li:hover:nth-child(8n+4), .nav li.active:nth-child(8n+4){
	  border-bottom: #9b7a2a 2px solid;
	}
	.nav li:hover:nth-child(8n+5), .nav li.active:nth-child(8n+5){
	  border-bottom: #9b7a2a 2px solid;
	}
	.nav li:hover:nth-child(8n+6), .nav li.active:nth-child(8n+6){
	  border-bottom: #9b7a2a 2px solid;
	}
	.nav li:hover:nth-child(8n+7), .nav li.active:nth-child(8n+7){
	  border-bottom: #9b7a2a 2px solid;
	}
	.nav li:hover:nth-child(8n+8), .nav li.active:nth-child(8n+8){
	  border-bottom: #9b7a2a 2px solid;
	}

	.navbar-toggle .icon-bar{
		color: #fff;
		background: #000000;
	}		
	</style>
<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/bootstrap-select.css">
<script src="<?=base_url()?>bs/jquery/jquery-3.2.1.min.js"></script>
<script src="<?=base_url()?>bs/js/datatables.js"></script>
<style>
.tab-pane{
  border-top:none;
  border-radius: 15px; 
}
.tab-content{
  margin-bottom:4%;
}
.mytab{
  border:thin solid #DA3030 !important;
  border-bottom: solid #f00333 1px !important;
  background-color:white !important;
  color:#3d3d3d !important;
  cursor: pointer;
  font-family: 'Roboto-Black'; 
}
.nav li.active .mytab{
  background-color:#DA3030 !important;
  color:white !important;
  cursor: pointer;  
}
/* End Landing Page */
</style>
<?php
if(isset($_SERVER['HTTP_USER_AGENT'])){
    $agent = $_SERVER['HTTP_USER_AGENT'];
}
	// echo '<style type="text/css">#nav100{margin-top:70px}</style>';
if (stripos( $agent, 'Chrome') !== false)
{
    // echo "Google Chrome";
}

elseif (stripos( $agent, 'Safari') !== false)
{
   // echo "Safari";
   // echo '<style type="text/css">#nav100{margin-top:5.4%}</style>';
   echo '<style type="text/css">.mobile-view{margin-top:6em}</style>';
   // echo '<style type="text/css">.header-iphone{margin-top:5em}</style>';
}
?>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.10&appId=478665635841729";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="gotop">

</div>
<!--<nav class="navbar navbar-fixed-top" style="position: sticky;margin-bottom: 0;border-width:0; clear:both;display:block;position:relative">-->


<div class="hidden-md hidden-lg" id="header_mobile" style="background:url('<?=base_url()?>img/h21.png')no-repeat center center;background-size:cover;padding:7px;">
<div class="container-fluid" >
<div class="row">
<div class="col-xs-6 col-sm-6 text-right"><a href="<?=base_url()?>" ><img src="<?=base_url()?>img/logo2.png" class="img img-responsive" id="img2"></a></div>
<?php
if(!isset($_SESSION["member_id"]))
{
	?>
	
<!--<div class="col-xs-6 col-sm-6 pull-right"><a data-toggle="modal" data-target="#mlogin" class="btn btn-warning btn-sm btn-block clickable">MASUK</a></div>-->
<div class="col-xs-6 col-sm-6 pull-right" style="line-height: 38px;text-align: right;"><a data-toggle="modal" data-target="#mlogin" class="clickable btn btn-primary" style="color:white;font-weight:bold">DAFTAR</a></div>
	<?php
}
else{
	
	$prof_pic=$this->db->query("SELECT b.pic,a.name FROM tbl_member a INNER JOIN tbl_gallery b ON b.id_gallery=a.profile_pic WHERE id_member='".$_SESSION["member_id"]."'")->row_array();
	?>
	<div class="col-xs-6 col-sm-6 pull-right text-right"><a href="<?=base_url()?>home/member_area"><img src="<?=base_url()?>systems/img_storage/<?=$prof_pic["pic"]?>" class="img img-circle" width="30px" height="30px"/>   <small style="color:black;"><?=$prof_pic["name"]?> </small></a></div>
	<?php
}
?>
</div>
</div>
</div>

<div id="nav100" style="display:flex;"class="hidden-sm hidden-xs">
<div class="container">
<div class="col-lg-3 col-md-3" style="margin:auto"><a href="<?=base_url()?>"><img src="<?=base_url()?>img/logo2.png" style="width:150px;" title="EyeSoccer"></a><!--<a href="<?=base_url()?>eyeprofile" class="btn btn-danger btn-sm" style="border-radius:0px;">DAFTAR LIGA USIA MUDA</a>--></div>
<div class="col-lg-6 col-md-6 text-center">
<!--
<a href="<?=base_url()?>eyeprofile/pemain" title="Pemain"><img src="<?=base_url()?>img/pemain_hitam.png" class="img img-responsive" style="width:35px;height:35px;display:inline;"></a>&emsp;&ensp;
<a href="<?=base_url()?>eyeprofile/klub" title="Klub"><img src="<?=base_url()?>img/club_hitam.png" class="img img-responsive" style="width:35px;height:35px;display:inline;"></a>&emsp;&ensp;
<a href="<?=base_url()?>eyenews" title="Eyenews"><img src="<?=base_url()?>img/eyenews_nav.png" class="img img-responsive" style="width:35px;height:35px;display:inline;"></a>&emsp;&ensp;
<a href="<?=base_url()?>eyetube" title="Eyetube"><img src="<?=base_url()?>img/eyetube_nav.png" class="img img-responsive" style="width:35px;height:35px;display:inline;"></a>&emsp;&ensp;
<a href="<?=base_url()?>eyevent" title="Eyevent"><img src="<?=base_url()?>img/eyevent_nav.png" class="img img-responsive" style="width:35px;height:35px;display:inline;"></a>&emsp;&ensp;
-->
</div>
<div class="col-lg-3 col-md-3" style="margin:auto">
<?php
if(!isset($_SESSION["member_id"]))
{
?>
<a data-toggle="modal" data-target="#mlogin" style="float:right;" id="a101">&nbsp; Masuk</a><a href="<?=base_url()?>eyeprofile" class="btn btn-primary" style="float:right;" id="a102"> Pendaftaran Liga </a>
<?php
}
else{
$prof_pic=$this->db->query("SELECT b.pic,a.name FROM tbl_member a left JOIN tbl_gallery b ON b.id_gallery=a.profile_pic WHERE a.id_member='".$_SESSION["member_id"]."'")->row_array();
?>
<a href="<?=base_url()?>home/member_area" class="pull-right"><img src="<?=base_url()?>systems/img_storage/<?php if(!empty($prof_pic["pic"])){echo $prof_pic["pic"];}else{echo "no-person.jpg";}?>" class="img img-circle" width="30px" height="30px"/>   <small style="color:black;"><?=$prof_pic["name"]?> </small></a>
<?php
}
?>
</div>
</div>
</nav>
<!--<img src="<?=base_url()?>img/lw1.png" class="img img-responsive hidden-xs hidden-sm">-->


<style>
.btn-circle {
    width: 30px;
    height: 30px;
    padding: 6px 0px;
    border-radius: 15px;
    text-align: center;
    font-size: 12px;
    line-height: 1.42857;
}
.clickable{
	cursor:pointer;
}
.img-circle{
	width:30px !important;
	height:30px !important;
}
</style>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>bs/css/circle-menu.min.css"><!-- update rizki -->
<link rel="stylesheet" type="text/css" href="<?=base_url()?>bs/css/jquery.bxslider.css"><!-- update rizki -->
<link rel="stylesheet" type="text/css" href="<?=base_url()?>bs/css/main.css"><!-- update rizki -->
<link rel="stylesheet" type="text/css" href="<?=base_url()?>bs/css/datatables.css"><!-- update rizki -->

<div id="mdl2" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
      <h1 class="text-center" id="t1">SIGN IN</h1>
      <div class="form-group"><input type="text" name="username" class="form-control" id="ipt1"></div>
      </div>
    </div>
  </div>
</div>


<div id="mlogin" class="modal fade" role="dialog">
<div class="modal-dialog">
    <div class="modal-content" width="80%">
    <div class="modal-header text-center"><h1 id="t3">MASUK</h1></div>
      <div class="modal-body">
 
    <ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#tab-login" id="a4">Masuk</a></li>
		<li class=""><a data-toggle="tab" href="#tab-daftar" id="a4">Daftar</a></li>
		</ul>
		<div class="tab-content">
		<div id="tab-login" class="tab-pane fade in active">
		<br />
		
		 <form method="post">
      <div class="form-group" id="t1"><input type="text" name="username" class="form-control" id="ipt1" placeholder="Email" required></div>
      <div class="form-group" id="t1"><input type="password" name="password" class="form-control" id="ipt1" placeholder="Password" required></div>
      <div class="form-group" id="t1"><input type="submit" name="login" value=" LOGIN " class="btn btn-warning col-lg-5" ><br /></div>
     
      </form>
  <?php
      if(isset($_POST['login'])){
      $username=$_POST['username'];
      $password=$_POST['password'];
      $cmd=$this->db->query("select * from tbl_member where email='".$username."' and password='".md5($password)."' and verification=1");
      $row=$cmd->row_array();
      $user_id=$row['id_member'];
	  $cek = $cmd->num_rows();
		if($cek>0)
		{
			if($row['id_member']=="" && $row['password']==""){
				 // print_r($_POST);
				//  exit;
			  header("refresh:0");  
			  }
			  else{
			  $_SESSION['member_id']=$user_id;
			  header("location:".base_url()."home/member_area");  
			  }  
		}else{
			echo "<script>alert('Email atau Password salah')</script>";
			header("refresh:0");  
		}
      
      }
      ?>
		</div>
		<div id="tab-daftar" class="tab-pane fade in ">
		
		<br />
		 <!--<form class="form-horizontal" action="register_post.php" method="post"  id="reg_form">-->
		 <form class="form-horizontal" method="post"  id="reg_form">
    <fieldset>
      
      <!-- Form Name -->
      <legend> Personal Information </legend>
    
<input type="hidden"  id="redirect-url" value="<?=base_url()?>member-area"/>
      <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label">Nama Lengkap</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input  name="name" placeholder="First Name" class="form-control"  type="text">
          </div>
        </div>
      </div>
      
	       <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label">E-Mail *</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input name="email" placeholder="E-Mail Address" class="form-control email"  type="emailAddress">
          </div>
        </div>
      </div>
      
    
        <div class="form-group has-feedback">
            <label for="password"  class="col-md-4 control-label">
                    Password *
                </label>
                <div class="col-md-6  inputGroupContainer">
                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <input class="form-control" id="userPw" type="password" placeholder="password" value="asdfghjkl" name="password" data-minLength="5"
                       data-error="some error"
                       required/>
                <span class="glyphicon form-control-feedback"></span>
                <span class="help-block with-errors"></span>
                </div>
             </div>
        </div>
     
        <div class="form-group has-feedback">
            <label for="confirmPassword"  class="col-md-4 control-label">
                   Confirm Password *
                </label>
                 <div class="col-md-6  inputGroupContainer">
                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <input class="form-control {$borderColor}" id="userPw2" type="password" placeholder="Confirm password" 
                       name="confirmPassword" data-match="#confirmPassword" data-minLength="5"
                       data-match-error="some error 2"
                       required/>
                <span class="glyphicon form-control-feedback"></span>
                <span class="help-block with-errors"></span>
      			 </div>
             </div>
        </div>
     
  
      <!-- Button -->
      <div class="form-group">
        <label class="col-md-4 control-label"></label>
        <div class="col-md-4">
          <!--<button type="submit" name="daftar_regis" value="daftar_regis" class="btn btn-warning" id="submit-button">Daftar <span class="glyphicon glyphicon-send"></span></button>-->
		  <input type="submit" name="daftar_regis" value="Daftar" class="btn btn-warning" >
        </div>
      </div>
    </fieldset>
  </form>
 <?php
 if(isset($_POST['daftar_regis'])){
		// echo "masuk";exit();
			$i=0;
			$cmd=$this->db->query("select * FROM tbl_member WHERE email='".$_POST["email"]."' LIMIT 1");
			$cek = $cmd->num_rows();
			if($cek<1)
			{
				$randurl = substr(md5(microtime()),rand(0,26),5);
				$this->db->query("INSERT INTO tbl_member (name,email,join_date,member_type,unique_code,password,verification) values ('".$_POST["name"]."','".$_POST["email"]."','".date("Y-m-d H:i:s")."','Regular','".$randurl."','".md5($_POST["password"])."','0')");
				$insert_id = $this->db->insert_id();
				$id=$insert_id;
				// $_SESSION["member_id"]=$id;
				// $_SESSION["member_username"]=$_POST["email"];
				// $_SESSION["member_name"]=$_POST["name"];
				// $html["html1"]=$_POST["name"];
				/* $this->email->set_newline("\r\n");
				$this->email->from('info@eyesoccer.id', 'Info Eyesoccer');
				$this->email->to("".$_POST["email"]."");
				// $this->email->cc('another@another-example.com');
				$this->email->bcc('ebenk.rzq@gmail.com');

				$this->email->subject('Registrasi Member Eyesoccer');
				$this->email->message('Kepada '.$_POST["name"].',<br>Registrasi anda telah berhasil.<br>Silahkan klik link berikut https://www.eyesoccer.id/verifikasi?ver='.$randurl.' untuk verifikasi. Untuk informasi lebih lanjut silahkan hubungi kami di email info@eyesoccer.id
				<br><br>
				Salam Eyesoccer
				');
				$this->email->set_mailtype("html");
				
				if ($this->email->send())
				{
					echo "<script>alert('Registrasi berhasil, silahkan cek inbox atau spam pada email anda.')</script>";
					header("refresh:0");  
				}else{
					$this->db->query("delete from tbl_member where id_member=".$id."");
					echo "<script>alert('Registrasi gagal, email tidak valid.')</script>";
					header("refresh:0");  
				} */
				
				try {
					//Server settings
					$objMail->SMTPDebug = 2;                                 // Enable verbose debug output
					$objMail->isSMTP();                                      // Set objMailer to use SMTP
					$objMail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
					$objMail->SMTPAuth = true;                               // Enable SMTP authentication
					$objMail->Username = 'eyesoccerindonesia@gmail.com';                 // SMTP username
					$objMail->Password = 'BolaSepak777#';                           // SMTP password
					$objMail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
					$objMail->Port = 465;                                    // TCP port to connect to

					//Recipients
					$objMail->setFrom('info@eyesoccer.id', 'Info Eyesoccer');
					$objMail->addAddress("".$_POST["email"]."");               // Name is optional
					$objMail->addReplyTo('info@eyesoccer.id', 'Info Eyesoccer');
					$objMail->addBCC('ebenk.rzq@gmail.com');

					//Content
					$objMail->isHTML(true);                                  // Set eobjMail format to HTML
					$objMail->Subject = 'Registrasi Member Eyesoccer';
					$objMail->Body    = 'Kepada '.$_POST["name"].',<br>Registrasi anda telah berhasil.<br>Silahkan klik link berikut https://www.eyesoccer.id/verifikasi?ver='.$randurl.' untuk verifikasi. Untuk informasi lebih lanjut silahkan hubungi kami di email info@eyesoccer.id
					<br><br>
					Salam Eyesoccer';

					$objMail->send();
					// echo 'Message has been sent';
					echo "<script>alert('Registrasi berhasil, silahkan cek inbox atau spam pada email anda.')</script>";
					header("refresh:0");  
				} catch (Exception $e) {
					// echo 'Message could not be sent.';
					// echo 'objMailer Error: ' . $objMail->ErrorInfo;
					$this->db->query("delete from tbl_member where id_member=".$id."");
					echo "<script>alert('Registrasi gagal, email tidak valid.')</script>";
					header("refresh:0");  
				}
			}
			else{
				
				$html["html1"]="Email sudah terpakai";

				// echo json_encode($html);
				echo "<script>alert('Email sudah terpakai')</script>";
				header("refresh:0");  
			}
		}
 ?>
		</div>
		</div>
	
  <hr />
  
     </div>
     </div>
  </div>
</div>

<div id="m1" class="modal fade" role="dialog">
   <div class="modal-dialog" id="set7">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">MASUK</h1></div>
      <div class="modal-body">
     
		<form method="post" action="<?=base_url()?>eyeprofile/login">
      <div class="form-group" id="t1"><input type="text" name="username" class="form-control" id="ipt1" placeholder="Username" required></div>
      <div class="form-group" id="t1"><input type="password" name="password" class="form-control" id="ipt1" placeholder="Password" required></div>
      <div class="form-group" id="t1"><input type="submit" name="opt1_official" value="LOGIN" class="btn btn-block" id="btn1"></div><br><br>
      
      </form>
      
		</div>
		
	
      </div>
    </div>
  </div>


<div id="player_login" class="modal fade" role="dialog">
  <div class="modal-dialog" id="set7">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">MASUK</h1></div>
      <div class="modal-body">
      <form method="post">
      <div class="form-group" id="t1"><input type="text" name="username" class="form-control" id="ipt1" placeholder="Username" required></div>
      <div class="form-group" id="t1"><input type="password" name="password" class="form-control" id="ipt1" placeholder="Password" required></div>
      <div class="form-group" id="t1"><input type="submit" name="opt1_player" value="LOGIN" class="btn btn-block" id="btn1"></div><br><br>
      <?php
      if(isset($_POST['opt1_player'])){
      $username=$_POST['username'];
      $password=$_POST['password'];
      $cmd=$this->db->query("select * from tbl_users a INNER JOIN tbl_club b ON b.user_id=a.user_id where a.username='$username' and a.password='$password'");
      $row=$cmd->row_array();
      $user_id=$row['user_id'];
      if($row['username']=="" && $row['password']==""){
      header("refresh:0");  
      }
      else{
      $_SESSION['user_id']=$user_id;
      $_SESSION['club_id']=$row["club_id"];
      header("location:".base_url("eyeprofile/daftar/player"));  
      }   
      }
      ?>
      </form>
      </div>
    </div>
  </div>
</div>

<div id="official_login" class="modal fade" role="dialog">
  <div class="modal-dialog" id="set7">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">MASUK</h1></div>
      <div class="modal-body">
      <form method="post">
      <div class="form-group" id="t1"><input type="text" name="username" class="form-control" id="ipt1" placeholder="Username" required></div>
      <div class="form-group" id="t1"><input type="password" name="password" class="form-control" id="ipt1" placeholder="Password" required></div>
      <div class="form-group" id="t1"><input type="submit" name="opt1_official" value="LOGIN" class="btn btn-block" id="btn1"></div><br><br>
      <?php
      if(isset($_POST['opt1_official'])){
      $username=$_POST['username'];
      $password=$_POST['password'];
      $cmd=$this->db->query("select * from tbl_users a INNER JOIN tbl_club b ON b.user_id=a.user_id where a.username='$username' and a.password='$password'");
      $row=$cmd->row_array();
      $user_id=$row['user_id'];
      if($row['username']=="" && $row['password']==""){
      header("refresh:0");  
      }
      else{
      
      $_SESSION['user_id']=$user_id;
      $_SESSION['club_id']=$row["club_id"];
      header("location:".base_url("eyeprofile/daftar/official"));  
      }  
      }
      ?>
      </form>
      </div>
    </div>
  </div>
</div>


<!--<div style="float:left;line-height:45px;border-radius:0px;"><a href="" class="btn btn-danger btn-sm" style="border-radius:0px;">DAFTAR LIGA USIA MUDA</a></div>
<center>
<a href="" data-target="#myCarousel1" data-slide-to="0" class="active"><img src="<?=base_url()?>img/pemain_hitam.png" class="img img-responsive" style="width:45px;height:45px;display:inline;"></a>&emsp;&emsp;
<a href="" data-target="#myCarousel1" data-slide-to="1"><img src="<?=base_url()?>img/club_hitam.png" class="img img-responsive" style="width:45px;height:45px;display:inline;"></a>&emsp;&emsp;
<a href="" data-target="#myCarousel1" data-slide-to="2"><img src="<?=base_url()?>img/register_hitam.png" class="img img-responsive" style="width:45px;height:45px;display:inline;"></a>&emsp;&emsp;
</center>-->

</div>  


<?=$body?>
<br style="clear:both"/>
<!-- end of desktop view -- >


<!-- update rizki start-->
<nav class="c-circle-menu js-menu">
<img style="width: 48px;" src="<?=base_url()?>img/imageedit_6_8277776047.png" class="c-circle-menu__toggle2 js-menu-toggle">
  <button class="c-circle-menu__toggle js-menu-toggle" style="display:none">
    <span>Toggle</span>
  </button>
  <ul class="c-circle-menu__items" style="display:none">
    <li class="c-circle-menu__item" style="display:none">
      <a href="<?=base_url()?>home" class="c-circle-menu__link">
        <img src="<?=base_url()?>img/tab_icon.png" alt="">
      </a>
    </li>
    <li class="c-circle-menu__item" style="transform:translate(-113px, -10px)">
      <a href="<?=base_url()?>home" class="c-circle-menu__link">
        <img src="<?=base_url()?>img/tab_icon.png" alt="" style="max-width: 100%;">
      </a>
    </li>
    <li class="c-circle-menu__item" style="transform: translate(-72px, -61px);">
      <a href="<?=base_url()?>eyenews" class="c-circle-menu__link">
        <img src="<?=base_url()?>img/icon-eyenews.png" alt="">
      </a>
    </li>
    <li class="c-circle-menu__item" style="transform: translate(-17px, -112px);">
      <a href="<?=base_url()?>eyevent" class="c-circle-menu__link">
        <img src="<?=base_url()?>img/icon-eyevent.png" alt="">
      </a>
    </li>
    <li class="c-circle-menu__item" style="display:none">
      <a href="<?=base_url()?>home" class="c-circle-menu__link">
        <img src="<?=base_url()?>img/tools.svg" alt="">
      </a>
    </li>
  </ul>
  <ul class="c-circle-menu__items" style="left: -45px;position: absolute;top: 16px;display:none">
    <li class="c-circle-menu__item circle-menu2-1" style="display:none;">
      <a href="<?=base_url()?>home" class="c-circle-menu__link">
        <img src="<?=base_url()?>img/house.svg" alt="">
      </a>
    </li>
    <li class="c-circle-menu__item circle-menu2-2" style="transform: translate(-130px, -26px);">
      <a href="<?=base_url()?>eyeme/home" class="c-circle-menu__link">
        <img src="<?=base_url()?>img/icon-eyeme.png" alt="">
      </a>
    </li>
    <li class="c-circle-menu__item circle-menu2-3" style="transform: translate(-95px, -95px);">
     <a href="<?=base_url()?>" class="c-circle-menu__link">
        <img src="<?=base_url()?>img/icon-eyemarket.png" alt="">
      </a>
    </li>
    <li class="c-circle-menu__item circle-menu2-4" style="transform: translate(-44px, -156px);">
      <a href="<?=base_url()?>eyetube" class="c-circle-menu__link">
        <img src="<?=base_url()?>img/icon-eyetube.png" alt="">
      </a>
    </li>
    <li class="c-circle-menu__item circle-menu2-5" style="transform: translate(24px, -195px);">
      <a href="<?=base_url()?>eyeprofile/eyeprofile_tab" class="c-circle-menu__link">
        <img src="<?=base_url()?>img/icon-eyeprofile-putih.png" alt="">
      </a>
    </li>
	<li class="c-circle-menu__item circle-menu2-6" style="transform: translate(70px, -205px);display:none">
      <a href="#" class="c-circle-menu__link">
        <img src="<?=base_url()?>img/tools.svg" alt="">
      </a>
    </li>
  </ul>
  <div class="c-circle-menu__mask js-menu-mask"></div>
</nav>

<script src="<?=base_url()?>bs/js/dist/circleMenu.min.js"></script>
<!-- update rizki end-->

<script src="<?=base_url()?>bs/jquery/jquery-3.2.1.min.js"></script>
<script src="<?=base_url()?>bs/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>bs/js/jquery.bxslider.js"></script><!-- update rizki-->
<script src="<?=base_url()?>bs/js/directorySlider.js"></script><!-- update rizki-->
<script src="<?=base_url()?>bs/js/main.js"></script><!-- update rizki-->
<script src="<?=base_url()?>bs/js/matchheight.js"></script>
<script type='text/javascript' src='<?=base_url()?>bs/js/sharethis.js#property=596cf64cb69de60011989f08&product=inline-share-buttons' async='async'></script>
<script type="text/javascript" language="javascript" src="<?=base_url()?>bs/js/build/jquery.datetimepicker.full.js"></script>
<script src='<?=base_url()?>bs/js/bootstrapvalidator.min.js'></script>
<script src="<?=base_url()?>assets/dist/js/bootstrap-select.js"></script>
<script src='<?=base_url()?>bs/js/jquery.chained.js'></script>

<?php
if(isset($extrascript))
{
	echo $extrascript;
}
?>
<script> 
$(document).ready(function(){
   $('video').bind('contextmenu',function() { return false; });
}); 
$(document).ready(function(){
  pw=parseInt($(".parent-image").width());
  cw=parseInt($(".child-image").width());
  perpc=(cw/pw)*100;
  if(perpc>=50)
  {
    $(".child-image").width(pw);
  }
//alert(perpc);
  
})
</script>
<script>
function openNav1() {document.getElementById("myNav1").style.width = "100%";}
function openNav2() {document.getElementById("myNav2").style.width = "100%";}
function closeNav1() {document.getElementById("myNav1").style.width = "0%";}	
function closeNav2() {document.getElementById("myNav2").style.width = "0%";}  

$(document).ready(function(){

    // hide .navbar first
    $(".gotop").hide();

    // fade in .navbar
    $(function () {
        $(window).scroll(function () {

                 // set distance user needs to scroll before we start fadeIn
            if ($(this).scrollTop() > 100) {
                $('.gotop').fadeIn();
            } else {
                $('.gotop').fadeOut();
            }
        });
    });

});

$(window).on('load',function(){

$('#mdl1').modal('show');

});

$(function(){
	$(".datetimepicker").datetimepicker({
		 format: 'Y-m-d H:i:s'
	});
	
})
 $(function() {
	 
                $('.thumbnail').matchHeight({
                    byRow: true,
                    property: 'height',
                    target: null,
                    remove: false
                });
        $('.thumbnail3').matchHeight({
                    byRow: true,
                    property: 'height',
                    target: null,
                    remove: false
                });
            });  

</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-102907561-1', 'auto');
  ga('send', 'pageview');

</script>

<!--<style>
body { padding-bottom: 70px; }
</style> 
<nav class="navbar navbar-default navbar-fixed-bottom" style="background-color:#2ED1A2;border-color:#2ED1A2;">
  <div class="container">
    <center><h4 style="color:white;line-height:200%">&copy;eyesoccer.com 2016</h4></center>
  </div>
</nav>-->

<div class="col-lg-12 col-xs-12" style="background-color:#4a4a4a;border-color:#2ED1A2;position:relative;bottom:0px;left:0px;display:block;width:100%">
<center><h5 style="color:white;line-height:200%"> 
<a href="<?=base_url()?>home/tentang_kami" style="text-decoration:none;color:white">Tentang Kami</a> &emsp;
<a href="<?=base_url()?>home/tentang_kami" style="text-decoration:none;color:white">Kebijakan Privasi</a> &emsp;
<a href="<?=base_url()?>home/tentang_kami" style="text-decoration:none;color:white">Kontak</a> &emsp;
<a href="<?=base_url()?>home/tentang_kami" style="text-decoration:none;color:white">Karir</a>
<br> &copy; 2017 eyesoccer.id All Rights Reserved &emsp; 
<a href="<?=base_url()?>home/facebook" style="text-decoration:none;color:white"><img src="<?=base_url()?>assets/images/ic_facebook.png" class="img img-responsive" style="width:12px;height:20px;display:inline;"></a>
<a href="<?=base_url()?>home/twitter" style="text-decoration:none;color:white"><img src="<?=base_url()?>assets/images/ic_twitter.png" class="img img-responsive" style="width:19px;height:16px;display:inline;"></a>
<a href="<?=base_url()?>home/instagram" style="text-decoration:none;color:white"><img src="<?=base_url()?>assets/images/ic_instagram.png" class="img img-responsive" style="width:20px;height:20px;display:inline;" ></a>
</h5></center></div> 
<style>
#back1{
	-webkit-border-bottom-right-radius: 20px;
-moz-border-radius-bottomright: 20px;
border-bottom-right-radius: 20px;
}
</style>
<!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,3847420,4,0,0,0,00010000']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>
<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?3847420&101" alt="free geoip" border="0"></a></noscript>
<!-- Histats.com  END  -->

<script type="text/javascript">
 
   $(document).ready(function() {
	   
	$("body").on("focus","#userPw",function(){
		$(this).val("");
	})	
$('#reg_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
         
            
	 email: {
                validators: {
                    notEmpty: {
                        message: 'Mohon isi E-mail anda sebagai Username anda '
                    },
                    emailAddress: {
                        message: 'Mohon isi valid E-mail'
                    }
                }
            },
					
	password: {
            validators: {
				 notEmpty: {
                        message: 'Mohon isi E-mail anda sebagai Username anda '
                    },
                identical: {
                    field: 'confirmPassword',
                    message: 'Mohon konfirmasi Password anda di bawah ini'
                }
            }
        },
        confirmPassword: {
            validators: {
                identical: {
                    field: 'password',
                    message: 'Konfirmasi Password tidak sama'
                }
            }
         },
			
            
            }
        }).on('success.form.bv', function(e) {

			  alert("tes");
           // $('#success_message').slideDown({ opacity: "show" }, "slow");
            $('#submit-button').removeAttr("disabled");

			
        });

		$('body').on("click","#submit-button",function(event){
            // Get the BootstrapValidator instance
$.ajax({       
				type: "POST",   
				url: $('#reg_form').attr( 'action' ),
				data: $('#reg_form').serialize(),
				dataType: "json",  
				success:function(data){  
				if(data.html1!="existed")
				{
					alert("Terima kasih "+data.html1+" anda sudah terdaftar sebagai member kami");
					$(location).attr('href', $("#redirect-url").val());
				}
				else{
					$(".email").val("");
					$(".email").focus();
					alert("E-mail anda sudah terdaftar !");
					
				}
				}   
			});
			event.preventDefault();
	   })
    
});

</script>
<script>
if(window.outerWidth < 780){
	$(".desktop-view").hide();
	$(".desktop-view img").attr("src","");
	$(".mobile-view").show();
}else{
	$(".js-menu").hide();
	$(".mobile-view").hide();
	$(".desktop-view").show();
}
</script>
<script> 
$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");
                $("#panel").css("display","inline-block");
    });
});
$(document).ready(function(){
    $("#flip1").click(function(){
        $("#panel1").slideToggle("slow");
                $("#panel1").css("display","inline-block");
    });
});
$(window).scroll(function() {

    if ($(this).scrollTop()>0)
     {
        $('.navbar-fixed-top').css("position","fixed");
     }
    else
     {
        $('.navbar-fixed-top').css("position","relative");
     }
 });
</script>

<script>
$(function(){
    $('.button-checkbox').each(function(){
    	var $widget = $(this),
			$button = $widget.find('button'),
			$checkbox = $widget.find('input:checkbox'),
			color = $button.data('color'),
			settings = {
					on: {
						icon: 'glyphicon glyphicon-check'
					},
					off: {
						icon: 'glyphicon glyphicon-unchecked'
					}
			};

		$button.on('click', function () {
			$checkbox.prop('checked', !$checkbox.is(':checked'));
			$checkbox.triggerHandler('change');
			updateDisplay();
		});

		$checkbox.on('change', function () {
			updateDisplay();
		});

		function updateDisplay() {
			var isChecked = $checkbox.is(':checked');
			// Set the button's state
			$button.data('state', (isChecked) ? "on" : "off");

			// Set the button's icon
			$button.find('.state-icon')
				.removeClass()
				.addClass('state-icon ' + settings[$button.data('state')].icon);

			// Update the button's color
			if (isChecked) {
				$button
					.removeClass('btn-default')
					.addClass('btn-' + color + ' active');
			} 
            else 
            { 
                $button
					.removeClass('btn-' + color + ' active')
					.addClass('btn-default');
			}
		}
		function init() {
			updateDisplay();
			// Inject the icon if applicable
			if ($button.find('.state-icon').length == 0) {
				$button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
			}
		}
		init();
	});
});
</script>
	<script src="<?=base_url()?>bs/jquery/jquery-3.2.1.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>bs/js/owl.carousel.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$('#jadwal-slider').owlCarousel({
			    loop:true,
			    margin:0,
			    items:6,
			    autoWidth:true,
			    nav:false,
			    itemsDesktop:[1199,6],
			    itemsDesktopSmall:[979,3],
			});

			var jadwalSlider = $('#jadwal-slider');
			jadwalSlider.owlCarousel();

			$('.jadwalPrev').click(function()
			{
			    jadwalSlider.trigger('prev.owl.carousel');
			});

			$('.jadwalNext').click(function()
			{
			    jadwalSlider.trigger('next.owl.carousel');
			});

			$('#club-slider').owlCarousel({
			    loop: false,
			    margin:-2.5,
			          autoWidth:true,
			          nav: false,
			          items: 2,
			          dots: true,
			          dotsEach:true,
			          responsiveClass: true,
			          center: false,
			          responsiveRefreshRate: true
			});

			// $("#durasi-video").click();

			$("#haha").one("load", function()
			{
			  	// do stuff
			}).each(function()
			{
			  	if(this.complete) $('#durasi-video').click();
			});
		});

        function getDuration()
        {
            var video 	= document.getElementById('eyetube-satu');
            var durasi 	= parseInt(video.duration);

            var total ="";

            if (durasi < 59)
            {
            	total = durasi;
            	$('#durasi').append("00: "+total);
            }
            else
            if (durasi > 59 && durasi < 119)
            {
            	total = durasi - 60;
            	$('#durasi').append("01: "+total);
            }
            else
           	if (durasi > 120 && durasi < 179)
           	{
       			total = durasi - 120;
       			$('#durasi').append("02: "+total);
           	}
       	    else
   	    	if (durasi > 180 && durasi < 239)
   	    	{
   				total = durasi - 180;
   				$('#durasi').append("03: "+total);
   	    	}
    	    else
	    	if (durasi > 240 && durasi < 299)
	    	{
				total = durasi - 180;
				$('#durasi').append("04: "+total);
	    	}
	    	else
	    	if (durasi > 300 && durasi < 359)
	    	{
				total = durasi - 180;
				$('#durasi').append("05: "+total);
	    	}
        }
		
	</script>
</body>
</html>