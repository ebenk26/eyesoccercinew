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
   echo '<style type="text/css">.mobile-view{margin-top:6em}</style>';
   // echo '<style type="text/css">.header-iphone{margin-top:5em}</style>';
}

$_SESSION["device_detail"]="Dekstop";
function isMobileView() {
    return preg_match("/(iPhone|iPod|iPad|Android|BlackBerry|android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
// If the user is on a mobile device, redirect them
if(isMobileView()){
$_SESSION["device_detail"]="Mobile";
}

$runtext=$this->db->query("select * from tbl_running_text WHERE place='index' LIMIT 1")->row_array();

if($_SESSION["device_detail"]=="Dekstop"){

?>
<div class="desktop-view">
<!--<img src="<?=base_url()?>img/h1.png" class="img img-responsive">-->
<div class="navbar-wrapper" >
    <div class="container-fluid">
        <nav class="navbar navbar-fixed-top">
            <div class="container col-lg-12 col-xs-12 hidden-sm hidden-xs">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <!--<a class="navbar-brand" href="#">Logo</a>-->
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?=base_url()?>" style="font-family:Roboto-Black;">Home</a></li>
                        <li class=" dropdown">
                            <a href="#" class="dropdown-toggle " style="font-family:Roboto-Black;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">EyeProfile <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class=" dropdown">
                                    <li><a href="<?=base_url()?>player" style="font-family:Roboto-Black;">Player</a></li>
                                </li>
                                <li><a href="<?=base_url()?>club" style="font-family:Roboto-Black;">Club</a></li>
								<li><a href="<?=base_url()?>official" style="font-family:Roboto-Black;">Official</a></li>
                            </ul>
                        </li>
                        <li><a href="<?=base_url()?>eyetube" style="font-family:Roboto-Black;">EyeTube</a></li>
						<li><a href="<?=base_url()?>eyenews"style="font-family:Roboto-Black;">EyeNews</a></li>
						<li><a href="<?=base_url()?>eyeme" style="font-family:Roboto-Black;">EyeMe</a></li>
						<li><a href="<?=base_url()?>eyevent" style="font-family:Roboto-Black;">EyeVent</a></li>
						<li><a href="<?=base_url()?>eyetransfer" style="font-family:Roboto-Black;">EyeTransfer</a></li>
						<li><a href="<?=base_url()?>eyetiket" style="font-family:Roboto-Black;">EyeTiket</a></li>
						<li><a href="<?=base_url()?>eyemarket" style="font-family:Roboto-Black;">EyeMarket</a></li>
						<li><a href="<?=base_url()?>eyewallet" style="font-family:Roboto-Black;">EyeWallet</a></li>
                        <!--<li class=" dropdown"><a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Managers <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">View Managers</a></li>
                                <li><a href="#">Add New</a></li>
                            </ul>
                        </li>
                        <li class=" dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Staff <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">View Staff</a></li>
                                <li><a href="#">Add New</a></li>
                                <li><a href="#">Bulk Upload</a></li>
                            </ul>
                        </li>
                        <li class=" down"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">HR <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Change Time Entry</a></li>
                                <li><a href="#">Report</a></li>
                            </ul>
                        </li>-->
                    </ul>
                    <!--<ul class="nav navbar-nav pull-right">
                        <li class=" dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Signed in as  <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Change Password</a></li>
                                <li><a href="#">My Profile</a></li>
                            </ul>
                        </li>
                        <li class=""><a href="#">Logout</a></li>
                    </ul>-->
				<div class="col-lg-3 col-md-3" style="margin:auto; float:right; padding-top:10px;">
				<form method="get" action="">
				  <div class="input-group">
					<input type="text" class="form-control" placeholder="Search">
					<div class="input-group-btn">
					  <button class="btn btn-default" type="submit">
						<i class="glyphicon glyphicon-search"></i>
					  </button>
					</div>
				  </div>
				</form>
				</div>					
                </div>
            </div>
        </nav>
    </div>
</div>

<div class="container">

<div class="row">	
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" style="padding: 0px;">
				<div class="owl-nav">
					<div class="jadwalPrev">
						<img src="<?php echo base_url(); ?>assets/new_assets/btn-chevron-left.png" class="arrow-box-jadwal">
					</div>
		        </div>
			</div>
			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
				<div class="row" style="cursor: move;">
					<div id="jadwal-slider" class="owl-carousel">
					<?php
					foreach ($jadwal as $value)
					{	$date =  new DateTime($value['jadwal_pertandingan']);
						// var_dump(date_format($date,"Y/m/d"));exit();
					?>
						<div class="col-lg-2 col-md-2">
							<div class="item-jadwal">
								<div class="lingkup-box col-lg-2">
									<div class="box-jadwal">
										<img src="<?php echo base_url(); ?>assets/new_assets/box-jadwal-pertandingan.png" alt="">
										<div class="isi-box-jadwal">
											<div class="time-box-jadwal">
												<div style="float: left; font-size:12px;">
													<span>
														<?php echo date_format($date,"d M H:i"); ?>
													</span>
												</div>
												<div style="float: right; font-size:12px;">
													<span style="color: red;">
														<?php echo $value['live_pertandingan']; ?>LIVE SCTV
													</span>
												</div>
											</div>
											<div class="club-box-jadwal" style="font-size:14px;">
												<span><?php echo ($value['club_a']); ?></span>
												<div class="score-box-jadwal">
													<span>
														<?php base_url()."/systems/club_logo/".$value['logo_a']; ?>
													</span>
												</div>
											</div>
											<div class="club-box-jadwal" style="font-size:14px;">
												<span>
													<?php echo ($value['club_b']); ?>
												</span>
												<div class="score-box-jadwal">
													<span>
														<?php base_url()."/systems/club_logo/".$value['logo_b']; ?> 
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
<?php		
					}
?>
					</div>
				</div>
			</div>
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" style="padding: 0px;">
				<div class="owl-nav">
					<div class="jadwalNext">
						<img src="<?php echo base_url(); ?>assets/new_assets/btn-chevron-right.png" class="arrow-box-jadwal" style="float: right;">
					</div>
		        </div>
			</div>
		</div>
<br><br>
<!-- konten eyeProfile -->
		<div class="row">
			<div class="line-eyeprofile">
				<img src="<?php echo base_url(); ?>assets/new_assets/ic_eyeprofile.png">
				<span style="font-family: Montserratbold; color:#F08A38;font-size: 20px;">
					eyeProfile 
				</span>
				<img src="<?php echo base_url(); ?>assets/new_assets/line-eyeprofile.png">
			</div>
			<div style="text-align: right;color:#F08A38;">
				<a href="<?php echo base_url(); ?>eyeprofile/klub">
					Klub Lainnya
					<img src="<?php echo base_url(); ?>assets/new_assets/chevron-right-orange.png">
				</a>
			</div>
			<div class="owl-carousel owl-theme" id="club-slider" style="cursor: move;">
<?php 
			foreach ($profile_club as $club)
			{
?>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-2" style="padding: 0px;">
					<!--<img src="<?php //echo base_url(); ?>assets/new_assets/box-club white.png" style="width: auto;">-->
					<img src="<?php echo base_url(); ?>systems/club_logo/<?= $club['logo_club']; ?>" class="img img-responsive">				
					<div>
						<div style="position: absolute; top: 15%; left: 130%; width: 190px; ">
							<div style="font-family: Montserratbold;">
								<a href="<?php echo base_url(); ?>eyeprofile/klub_detail/<?= $club['club_id'];?>">
									<h4 style="font-size:9px;"><?= $club['nama_club']; ?></h4>
								</a>
							</div>
							<div style="color: #615d5d; font-size:9px;">
								<span>LIGA 1 INDONESIA</span>
							</div>
							<div class="keterangan-club">
								<table border="0">
									<tr>
										<td style="width: 60px;">Squad</td>
										<td>: </td>
										<td><?= $club['squad']; ?></td>
									</tr>
									<tr>
										<td>Manajer</td>
										<td>:</td>
										<td><?= $club['nama_manager']; ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					
				</div>
<?php		
			}
?>
			</div>
		</div>		
		<div class="row">
			<span style="color:#F08A38;">PEMAIN PROFESIONAL</span>
			<div style="float: right;">
				<img src="<?php echo base_url(); ?>assets/new_assets/chevron-left-rounded-deactive.png" id="haha">
				<img src="<?php echo base_url(); ?>assets/new_assets/chevron-right-rounded-active.png">
			</div>
			<br>
		</div>
		<br>
		<div class="row">
<?php 
		foreach ($profile_player as $player)
		{
			// $tgl = date_create($player['tgl_lahir']);
			$bulan 	= array(
			                '01' => 'Jan',
			                '02' => 'Feb',
			                '03' => 'Mar',
			                '04' => 'Apr',
			                '05' => 'Mei',
			                '06' => 'Juni',
			                '07' => 'Juli',
			                '08' => 'Agust',
			                '09' => 'Sept',
			                '10' => 'Okt',
			                '11' => 'Nov',
			                '12' => 'Des',
        			);
?>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<img src="<?php echo base_url(); ?>assets/new_assets/box-pemain banyak dilihat.png">
				<div style="position: absolute; top: 0%;">
					<img src="<?php echo base_url(); ?>systems/player_storage/<?= $player['foto']; ?>" style="width:114px; height: 114px;">
					<!-- <img src="<?php echo base_url(); ?>assets/new_assets/box-foto pemain banyak dilihat.png" style="position: absolute; top: 0%;"> -->
					<div class="box-player-name" style="position: absolute; top: 0%; left: 120%; width: 212%;">
						<h4 style="color:#F08A38;"><?= $player['nama']; ?></h4>
					
						<div class="box-ket-player">
							<table border="0">
								<tr>
									<td style="width: 100px;">Posisi</td>
									<td style="width: 5px;">:</td>
									<td><?= $player['posisi']; ?></td>
								</tr>
								<tr>
									<td>Klub</td>
									<td>:</td>
									<td><?= $player['klub']; ?></td>
								</tr>
								<tr>
									<td>Tanggal Lahir</td>
									<td>:</td>
									<td><?= $player['tanggal']." ".$bulan[$player['bulan']]." ".$player['tahun']; ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
<?php
		}
?>
		</div>
		<br>


<div class="line-eyeprofile">
<img src="<?php echo base_url(); ?>assets/new_assets/ic_eyetube.png">
<span style="font-family: Montserratbold; color:#347FC0;font-size: 20px;">eyeTube </span>
<img src="<?php echo base_url(); ?>assets/new_assets/line-eyetube.png" style="width: 1020px;">
</div>
<br>			
<div class="col-lg-7 col-md-7" style="padding-top:0px;padding-bottom:0px;padding-right:15px;padding-left:0px;">
<div class="col-lg-12 col-md-12">

<div class="row">
<?php
$cmd1=$this->db->query("select * from tbl_eyetube where publish_on<='".date("Y-m-d H:i:s")."' order by eyetube_id desc LIMIT 7");
$cmd2=$cmd1->result_array();
?>

<div id="myCarousel2" class="carousel slide" data-ride="carousel" data-interval="false">
  <div class="carousel-inner">
    <?php
    $data=$cmd2[0];
    ?>

      <div style="cursor:pointer" class="item active" onclick='window.location.assign("<?=base_url()?>eyetube/detail/<?=$data["eyetube_id"]?>")'>
      <div class="set100">
<video width="640" height="360" poster="<?=base_url()?>systems/eyetube_storage/<?php print $data['thumb']; ?>" controls controlsList="nodownload">
<source src="<?=base_url()?>systems/eyetube_storage/<?php print $data['video']; ?>" type="video/mp4"/></video> 
<small class="hidden-lg hidden-md" style="color: #cccccc;"> <?=$data['tube_view']?> viewers | <a class="emoticon" type_emot="like" style="color: #cccccc;"> <span class="replace_like"><?=$data['tube_like']?> Suka</a></small>
<small class="hidden-xs hidden-sm" style="color: #cccccc;"> <?=$data['tube_view']?> viewers | <a class="emoticon" type_emot="like" style="color: #cccccc;"><span class="replace_like"><?=$data['tube_like']?> Suka</span></a></small>
<a href="<?=base_url()?>eyetube/detail/<?=$data["eyetube_id"]?>"><h5 id="p100" style="margin-bottom:1px;"><?=$data["title"]?></h5></a>
		<!--<small id="t104"><?=date("d M Y",strtotime($data["createon"]))?></small>-->
		<p id="p102"><?=substr($data["description"],0,200)?> . . . <a href="<?=base_url()?>eyetube/detail/<?=$data["eyetube_id"]?>" id="t104">selengkapnya</a>
		</p>
      </div>        
      </div>
    </a>
  </div>
</div><br> 
</div>
</div>
</div>
<div class="col-lg-5 col-md-5" style="padding:0;">
<div style="padding-top:0px;"></div>
  <?php
    $data=$cmd2[1];
    ?>
<div class="col-lg-12 col-md-12">
 <a href="<?=base_url()?>eyetube/detail/<?=$data["eyetube_id"]?>">
<div class="set100 row" style="cursor:pointer" onclick='window.location.assign("<?=base_url()?>eyetube/detail/<?=$data["eyetube_id"]?>")'>
  <img src="<?=base_url().'systems/eyetube_storage/'.$data['thumb1'];?>" alt="Norway" style="width:100%;max-height:218px;">    
<div id="v105"><img src="<?=base_url()?>img/button_icon.png" class="img img-responsive" style="width:45px;height:45px;"></div></a>  
  <!--<div  class="hidden-sm"><?=$data["title"]?></div>-->
</div> 
</a>
</div>
</div>
<br><br>
<div class="col-lg-5 col-md-5" style="padding:0;">
<div style="padding-top:20px;"></div>
  <?php
    $data=$cmd2[2];
    ?>
<div class="col-lg-12 col-md-12">
 <a href="<?=base_url()?>eyetube/detail/<?=$data["eyetube_id"]?>">
<div class="set100 row" style="cursor:pointer" onclick='window.location.assign("<?=base_url()?>eyetube/detail/<?=$data["eyetube_id"]?>")'>
  <img src="<?=base_url().'systems/eyetube_storage/'.$data['thumb1'];?>" alt="Norway" style="width:100%;max-height:218px;">  
<div id="v105"><img src="<?=base_url()?>img/button_icon.png" class="img img-responsive" style="width:45px;height:45px;"></div></a>  
  
</div> 
</a>
</div>
</div>

<div class="col-lg-12 col-md-12">
<div class="row">
<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#mn900" class="border" id="tb101">EYESOCCER STARS</a></li>
<li><a data-toggle="tab" href="#mn901" class="border" id="tb101">VIDOE POPULAR</a></li>  
<li><a data-toggle="tab" href="#mn902" class="border" id="tb101">VIDEO KAMU</a></li>
</ul>
<div class="tab-content"><br>
<div class="col-xs-12 col-sm-12 pull-right" style="line-height: 38px;text-align: right;"><a >
<a style="color:#347fc0;font-weight:bold" href="<?php echo base_url(); ?>eyetube">Video Lainnya <img src="<?php echo base_url(); ?>assets/new_assets/chevron-right-blue.png"></a></div>
	<div id="mn900" class="tab-pane fade in active">
	
		<?php
		$result=$this->db->query("select * from tbl_eyetube where title like'%eyesoccer stars%' and active='1' order by eyetube_id desc limit 4");
		foreach($result->result_array() as $data)
		{
		$eyetube_id=$data['eyetube_id'];
		echo '
		<div class="col-lg-3 col-md-3 col-xs-12 col-sm-12">
		<div class="row">
		  <div class="media">
		    <div class="media-left">	      
			  	<div id="set100">
				<a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" >
				  <img src="'.base_url().'systems/eyetube_storage/'.$data['thumb1'].'" class="img-polaroid thumbnail2" alt="Lights" style="width:100% !important;margin: 0 auto;">
				<div id="v106"><img src="'.base_url().'img/button_icon.png" class="img img-responsive" style="width:45px;height:45px;"></div>				
				</div>
				<div class="media-heading">
				<p style="margin-bottom:0; padding-left:0px;" id="vt100">'.$data["title"].'</p>
				<p style="margin-bottom:0; padding-left:0px;" id="t104"><small style="color: #cccccc;">'.$data['tube_view'].' views </small> - <small style="color: #cccccc;">'.$data['tube_like'].' Suka</small></p>
				<p style="margin-bottom:0; padding-left:0px;" id="t104"><small>'.$data["createon"].'</small></p>				
				</div></a>
		    </div>			
		  </div>  
		</div>
		</div>
		';
		}
		?>
	</div>
	<div id="mn901" class="tab-pane fade">
		<?php
		$result=$this->db->query("select * from tbl_eyetube where publish_on<='".date("Y-m-d H:i:s")."' order by tube_view desc LIMIT 4");
		foreach($result->result_array() as $data)
		{
		$eyetube_id=$data['eyetube_id'];
		echo '
		<div class="col-lg-3 col-md-3 col-xs-12 col-sm-12">
		<div class="row">
		  <div class="media">
		    <div class="media-left">	      
			  	<div id="set100">
				<a href="'.base_url().'eyetube/detail/'.$eyetube_id.'">
				  <img src="'.base_url().'systems/eyetube_storage/'.$data['thumb1'].'" class="img-polaroid thumbnail2" alt="Lights" style="width:100% !important;margin: 0 auto;">
				<div id="v106"><img src="'.base_url().'img/button_icon.png" class="img img-responsive" style="width:45px;height:45px;"></div>
				</div>
				<div class="media-heading">
				<p style="margin-bottom:0; padding-left:0px;" id="vt100">'.$data["title"].'</p>
				<p style="margin-bottom:0; padding-left:0px;" id="t104"><small style="color:#6A5ACD">'.$data['tube_view'].' views </small> - <small style="color:#6A5ACD">'.$data['tube_like'].' Suka</small></p>				
				<p style="margin-bottom:0; padding-left:0px;" id="t104"><small>'.$data["createon"].'</small></p>				
				</div></a>				
		    </div>
		  </div>
		</div>
		</div>
		';
		}
		?>
	</div>
    <div id="mn902" class="tab-pane fade">
		<?php
		$result=$this->db->query("select * from tbl_eyetube where title like'%video kamu%' and active='1' order by eyetube_id desc limit 4");
		foreach($result->result_array() as $data)
		{
		$eyetube_id=$data['eyetube_id'];
		echo '
		<div class="col-lg-3 col-md-3 col-xs-12 col-sm-12">
		<div class="row">
		  <div class="media">
		    <div class="media-left">	      
			  	<div id="set100">
				<a href="'.base_url().'eyetube/detail/'.$eyetube_id.'">
				  <img src="'.base_url().'systems/eyetube_storage/'.$data['thumb1'].'" class="img-polaroid thumbnail2" alt="Lights" style="width:100% !important;margin: 0 auto;">
				<div id="v106"><img src="'.base_url().'img/button_icon.png" class="img img-responsive" style="width:45px;height:45px;"></div>
				</div>
				<div class="media-heading">
				<p style="margin-bottom:0; padding-left:0px;" id="vt100">'.$data["title"].'</p>
				<p style="margin-bottom:0; padding-left:0px;" id="t104"><small style="color:#6A5ACD">'.$data['tube_view'].' views </small> - <small style="color:#6A5ACD">'.$data['tube_like'].' Suka</small></p>				
				<p style="margin-bottom:0; padding-left:0px;" id="t104"><small>'.$data["createon"].'</small></p>				
				</div></a>				
		    </div>
		  </div>
		</div>
		</div>
		';
		}
		?>
	</div>
</div>
</div>
</div>

<br><br>

		  <!-- konten eyeNews dan eyeMe -->
		  <div class="row">
		  	<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12" style="padding: unset;">
	  			<img src="<?php echo base_url(); ?>assets/new_assets/ic_eyenews.png">
	  			<span style="font-family: Montserratbold; color:#CD4F41;font-size: 20px;">eyeNews</span>
	  			<img src="<?php echo base_url(); ?>assets/new_assets/line-eyenews.png">
	  			<br>
	  			<br>

			<?php
			$cmd1=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' order by eyenews_id desc LIMIT 7");
			$cmd2=$cmd1->result_array();
			?>
			<div id="myCarousel2" class="carousel slide" data-ride="carousel" data-interval="false">
			  <div class="carousel-inner">
				<?php
				$data=$cmd2[0];
				?>
				<a href="<?=base_url()?>eyenews/detail/<?=$data["eyenews_id"]?>">
				  <div style="cursor:pointer" class="item active" onclick='window.location.assign("<?=base_url()?>eyenews/detail/<?=$data["eyenews_id"]?>")'>
				  <div class="set100">
					<img src="<?=base_url().'systems/eyenews_storage/'.$data['pic'];?>" alt="Norway" class="img img-responsive">  
					<div id="setcenter100"><?=$data["title"]?></div>
				  </div>        
				  </div>
				</a>
			  </div>
			</div> 
				
	  			<div>
	  				<div style="color: #CD4F41;">BERITA TERKAIT</div>
<?php
	  			$i = 0;
	  			foreach ($eyenews_similar as $similar)
	  			{
	  				if ($i != 0)
	  				{
?>
	  					<div>
	  						<a href="<?php echo base_url(); ?>eyenews/detail/<?= $similar['eyenews_id'];?>">
	  							<img src="<?php echo base_url(); ?>assets/new_assets/chevron-right-red.png"> <?= $similar['title']; ?>
	  						</a>
	  					</div>
<?php			
	  				}
	  				$i++;
	  			}
?>
	  			</div>
		  	</div>
		  	<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" style="padding: unset;">
		  		<img src="<?php echo base_url(); ?>assets/new_assets/ic-eyeme.png">
		  		<span style="font-family: Montserratbold; color:#59B9E9;font-size: 20px;">eyeMe</span>
		  		<img src="<?php echo base_url(); ?>assets/new_assets/line-eyeme.png" style="width: 378px;">
				<br><br>
			<div class="col-lg-12 col-md-12" style="padding-top:0px;padding-left:0px;padding-right:0px;">
			<div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">

							<img src="http://fakeimg.pl/365x365/" class="img-responsive">
						</div>

						<div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle">
							<img src="http://fakeimg.pl/365x365/" class="img-responsive">
						</div>

						<div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
							<img src="http://fakeimg.pl/365x365/" class="img-responsive">
						</div>
			</div>
			<div class="col-lg-12 col-md-12" style="padding-top:14px;padding-left:0px;padding-right:0px;">
			<div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
							<img src="http://fakeimg.pl/365x365/" class="img-responsive">
						</div>

						<div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle">
							<img src="http://fakeimg.pl/365x365/" class="img-responsive">
						</div>

						<div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
							<img src="http://fakeimg.pl/365x365/" class="img-responsive">
						</div>
			</div>
			<div class="col-lg-12 col-md-12" style="padding-top:14px;padding-left:0px;padding-right:0px;">
			<div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
							<img src="http://fakeimg.pl/365x365/" class="img-responsive">
						</div>

						<div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle">
							<img src="http://fakeimg.pl/365x365/" class="img-responsive">
						</div>

						<div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
							<img src="http://fakeimg.pl/365x365/" class="img-responsive">
						</div>
			</div>				
		  	</div>
		  </div>
		  <br><br>
<div class="col-lg-7 col-md-7" style="padding-top:0px;padding-bottom:0px;padding-right:15px;padding-left:0px;">
<div class="col-lg-12 col-md-12">
<div class="row">

<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#mn700" class="border" id="tb102">TERPOPULER</a></li>
<li><a data-toggle="tab" href="#mn701" class="border" id="tb102">REKOMENDASI</a></li>  
<li><a data-toggle="tab" href="#mn702" class="border" id="tb102">USIA MUDA</a></li>
</ul>

<div class="tab-content"><br>

	<div id="mn700" class="tab-pane fade in active">
	<?php
	$cmd1=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' order by news_view desc limit 3");
	foreach($cmd1->result_array() as $data){
	print '<a href="'.base_url().'/eyenews/detail/'.$data["eyenews_id"].'" id="a100"><div class="media" style="cursor:pointer" onclick=\'window.location.assign("'.base_url().'/eyenews/detail/'.$data["eyenews_id"].'")\'>
	  <div class="media-left">
		<img src="systems/eyenews_storage/'.$data['thumb1'].'" class="media-object" style="width:130px;height:90px;"><br>
	  </div>
	  <div class="media-body">
		<h6 class="media-heading" id="t103">'.date("d M Y",strtotime($data["publish_on"])).'</h6>
		<p id="p101">'.$data["title"].'<p>
		<p>'.substr($data["description"],0,87).'...</p>
	  </div>
	  <hr style="border-bottom:solid #ccc 1px;margin-top:0px;"></hr>
	</div></a>'; 
	}
	?> 	
	</div>
	<div id="mn701" class="tab-pane fade">
	<?php
	$cmd1=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' order by eyenews_id desc LIMIT 3");
	foreach($cmd1->result_array() as $data){
	print '<a href="'.base_url().'/eyenews/detail/'.$data["eyenews_id"].'" id="a100"><div class="media" style="cursor:pointer" onclick=\'window.location.assign("'.base_url().'/eyenews/detail/'.$data["eyenews_id"].'")\'>
	  <div class="media-left">
		<img src="systems/eyenews_storage/'.$data['thumb1'].'" class="media-object" style="width:130px;height:90px;"><br>
	  </div>
	  <div class="media-body">
		<h6 class="media-heading" id="t103">'.date("d M Y",strtotime($data["publish_on"])).'</h6>
		<p id="p101">'.$data["title"].'
		'.substr($data["description"],0,100).'...</p>
	  </div>
	  <hr style="border-bottom:solid #ccc 1px;margin-top:0px;"></hr>
	</div></a>';
	}
	?> 	
	</div>
    <div id="mn702" class="tab-pane fade">
	<?php
	$cmd1=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' AND news_type in ('usia muda') order by news_view desc limit 3");
	foreach($cmd1->result_array() as $data){
	print '<a href="'.base_url().'/eyenews/detail/'.$data["eyenews_id"].'" id="a100"><div class="media" style="cursor:pointer" onclick=\'window.location.assign("'.base_url().'/eyenews/detail/'.$data["eyenews_id"].'")\'>
	  <div class="media-left">
		<img src="systems/eyenews_storage/'.$data['thumb1'].'" class="media-object" style="width:130px;height:90px;"><br>
	  </div>
	  <div class="media-body">
		<h6 class="media-heading" id="t103">'.date("d M Y",strtotime($data["publish_on"])).'</h6>
		<p id="p101">'.$data["title"].'
		'.substr($data["description"],0,100).'...</p>
	  </div>
	  <hr style="border-bottom:solid #ccc 1px;margin-top:0px;"></hr>
	</div></a>'; 
	}
	?>		
	</div>
</div>
</div>
</div>
</div>
<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" style="padding: unset;">
		  		<img src="<?php echo base_url(); ?>assets/new_assets/ic_eyemarket.png">
		  		<span style="font-family: Montserratbold; color:#F9C241;font-size: 20px;">eyeMarket</span>
		  		<img src="<?php echo base_url(); ?>assets/new_assets/line-eyemarket.png" style="width: 301px;">
				<br><br>
			<div class="col-lg-12 col-md-12" style="padding-top:0px;padding-left:0px;padding-right:0px;">
				<?php
					$cmd1=$this->db->query("select * from tbl_product where id_product order by id_product desc LIMIT 3")->result_array();
					foreach($cmd1 as $row1){		
				?>			
				<div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
					 <div class="media">
						<div class="media-left">
						  <img src="systems/club_logo/7566LOGO UNTUK APLIKASI.jpg" class="media-object img img-circle" id="img4">
						</div>
						<div class="media-body" style="padding-bottom:25px;">
						<a href="store_profile" id="a7">EYEMARKET</a><br>
						<a href="store_profile" id="a8">2 Store</a>
						</div>
					  </div><a href="eyemarket_detail?id_product=<?php echo $row1['id_product']; ?>" id="a3">
					<div class="thumbnail drop-shadow2" style="height:70% !important;width:100% !important;margin-bottom:0px;position:relative">
					<div class="thumbnail3">
						<img src="systems/eyemarket_storage/<?=$row1["pic"]?>" alt="Lights" class="img-polaroid thumbnail2" alt="Lights" style="width:100% !important;margin: 0 auto;">
						</div>
						</a>
						   <div class="pull-right bottom-align-text">
								<a href="eyemarket_detail?id_product=<?php echo $row1['id_product']; ?>" class="btn btn-success btn-sm" id="set8" role="button"><i class="fa fa-shopping-cart"></i> BELI</a>
							</div>    
						<div class="producttitle bottom-align-text"><?php echo $row1['product_name'];  ?></div>
						<div class="productprice">
						<div class="pricetext bottom-align-text">Rp.<?php echo number_format($row1['price'],2,",","."); ?></div>
						</div>
					</div> 					
				</div>
				<?php
				}
				?>
			</div>			
</div>
		  

</div>
</div>
<?php
}
?>
<!-- update rizki start -->
<div class="container-fluid mobile-view" style="display:none">
  <div class="row">
    <div class="col-lg-12">
      <ul class="bxslider">
        <a href="<?=base_url()?>eyeme/home"><li><img src="img/SLIDE-MOBILE-eyeme.png" title="Eyeme" /></li></a>
        <a href="<?=base_url()?>eyenews"><li><img src="img/SLIDE-MOBILE-eyenews.png" title="Eyenews" /></li></a>
        <a href="<?=base_url()?>eyetube"><li><img src="img/SLIDE-MOBILE-eyetube.png" title="Eyetube" /></li></a>
        <a href="<?=base_url()?>"><li><img src="img/SLIDE-MOBILE-eyemarket.png" title="Eyemarket" /></li></a>
      </ul>
    </div>
  </div>
  
  <a href='eyeprofile/eyeprofile_tab'>
  <div class="mobile-img-right bg-green">
    <div class="">
      <!--<i class="fa fa-users"></i>-->
      <img class="" src="img/icon-eyeprofile.gif">
    </div>
    <div class="title-img-mobilebtm">
      
    </div>
  </div>
  </a>
  <div class="mobile-img-left">
    <?php
      $query = "SELECT * FROM tbl_eyenews ORDER BY publish_on desc";
      $result = $this->db->query( $query);
      $row = $result->row_array();
      echo '<img src="systems/eyenews_storage/'.$row['thumb1'].'" alt="'.$row['title'].'">';
    ?>
    <!--<img class="" src="systems/eyenews_storage/2605-LIGA-1-lowres.jpg">-->
    <div class="title-img-mobile">
      <!--<i class="fa fa-newspaper-o"></i>-->
      <img class="img-mobile-menutopleft" src="img/icon-eyenews.png">
    </div>
    <?php
      // echo "<a class='mobile-content-hover' href='eyenews_detail?eyenews_id=".$row['eyenews_id']."'><div class='title-desc-mobile'><div class='text-margin'>".$row['title']."</div></div></a>";
      echo "<a class='mobile-content-hover' href='eyenews'><div class='title-desc-mobile'><div class='text-margin'>".$row['title']."</div></div></a>";
    ?>
  </div>

  <div class="mobile-img-leftlong">
    <a href='<?=base_url()?>eyeme/home'>
    <div class="img-leftlong-top bg-yellow">

      <div class="title-img-mobilecenter">
        <!--<i class="fa fa-camera"></i>-->
        <img class="img-mobile-menucenter" src="<?=base_url()?>img/icon-eyeme.png" style="transform: translate(0%, 0%);width: 50px;">
      </div>
      <div class="title-img-mobilebtm">
        
      </div>
      <div style="color: white;font-size: 12px;left: 5px; position: absolute;text-align: center;">
      <?php
        $query = "SELECT * FROM tbl_gallery g left join tbl_member m on m.id_member = g.upload_user where tags = 'eyeme' and publish_type = 'public' and m.name is not null and g.pic <> '1' and g.upload_date between '".date("Y-m-d")." 00:00:00' and '".date("Y-m-d H:i:s")."' group by g.id_gallery ORDER BY upload_date desc";
        $result = $this->db->query( $query);
        $counteyeme = ($result->num_rows());
      ?>
       New Post<br><?php echo $counteyeme;?>
      </div>
    </div>
    </a>
    <a href='eyetube'>
    <div class="img-leftlong-bottom bg-blue">
    
      <?php
        $query = "SELECT * FROM tbl_eyetube ORDER BY eyetube_id desc";
        $result = $this->db->query( $query);
        $row = $result->row_array();
        echo '<img src="systems/eyetube_storage/'.$row['thumb1'].'" alt="'.$row['title'].'" style="width:100%;">';
      ?>
      <div class="title-img-mobile">
        <img class="img-mobile-menu" src="img/icon-eyetube.png">
      </div>
      <?php
        echo "<div class='title-desc-mobile'><div class='text-margin'>".$row['title']."</div></div>";
      ?>
      
      <div class="title-img-mobilecenter">
        <?php
          echo '<img src="systems/eyetube_storage/'.$row['thumb1'].'" alt="'.$row['title'].'" style="width:100%;">';
        ?>
      </div>

    </div>
    </a>
  </div>
  <a href='<?=base_url()?>'>
  <div class="mobile-img-rightlong" style="background-color: #03ba8c;">
    
    <div class="title-img-mobilecenter">
      <img class="img-mobile-menu" src="img/icon-eyemarket.png">
    </div>
  </div>
  </a>
    
  <div class="mobile-img-leftlong" style="width: 100%;height:170px">
    <div class="img-leftlong-bottom" style="height:170px;">
      <?php
        $query = "SELECT * FROM tbl_event ORDER BY id_event desc";
        $result = $this->db->query( $query);
        $row = $result->row_array();
        echo '<img src="systems/eyevent_storage/'.$row['thumb1'].'" alt="'.$row['title'].'">';
      ?>
      <!--<img class="" src="systems/eyenews_storage/2605-LIGA-1-lowres.jpg">-->
      <div class="title-img-mobile">
        <!--i class="fa fa-calendar"></i>-->
        <img class="img-mobile-menu" src="img/icon-eyevent.png">
      </div>
      <?php
        // echo "<a class='mobile-content-hover' href='eyevent_detail?id_event=".$row['id_event']."'><div class='title-desc-mobile' style='width: 100%;'><div class='text-margin'>".$row['title']."</div></div></a>";
        echo "<a class='mobile-content-hover' href='eyevent'><div class='title-desc-mobile' style='width: 100%;'><div class='text-margin'>".$row['title']."</div></div></a>";
      ?>
    </div>
  </div>
</div>
<!-- update rizki end -->

