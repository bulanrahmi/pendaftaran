<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="description" content="Miminium Admin Template v.1">
	<meta name="author" content="Isna Nur Azis">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Klinik Nayaka Husada Mataram 01</title>

	<!-- start: Css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">

	<!-- plugins -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/plugins/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/plugins/simple-line-icons.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/plugins/animate.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/plugins/fullcalendar.min.css" />
	<link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
	<!-- end: Css -->
	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/logomi.png">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body id="mimin" class="dashboard">
	<!-- start: Header -->
	<nav class="navbar navbar-default header navbar-fixed-top">
		<div class="col-md-12 nav-wrapper">
			<div class="navbar-header" style="width:100%;">
				<div class="opener-left-menu is-open">
					<span class="top"></span>
					<span class="middle"></span>
					<span class="bottom"></span>
				</div>
				<a href="index.html" class="navbar-brand">
					<b>Nayaka Husada</b>
				</a>

				<ul class="nav navbar-nav search-nav">
					<li>
						<div class="search">
							<div class="form-group form-animate-text">
								<span class="bar"></span>
								<label><b style="color:white;"><?= date('D, d M Y H:m'); ?></b></label>
							</div>
						</div>
					</li>
					<!--          <li>
                            <div class="search">
                                <?php echo anchor('Pendaftaran', ' <span class="fa fa-user icon-sign-out" style="font-size:23px;"></span>'); ?>
                                <div class="form-group form-animate-text">
                                    <span class="bar"></span>
                                    <label><b style="color:white;">Pendaftaran</b></label>
                                </div>
                            </div>
                        </li>
                        
                        <li>
                            <div class="search">
                                <?php echo anchor('Tes', ' <span class="fa fa-users icon-sign-out" style="font-size:23px;"></span>'); ?>
                                <div class="form-group form-animate-text">
                                    <span class="bar"></span>
                                    <label><b style="color:white;">Tes Golongan Darah</b></label>
                                </div>
                            </div>
                        </li> -->
				</ul>

				<ul class="nav navbar-nav navbar-right user-nav">
					<li class="user-name"><span><?php echo $this->session->userdata('username') ?></span></li>
					<img src="<?php echo base_url() ?>assets/img/avatar.jpg" class="img-circle avatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" />
				</ul>
			</div>
		</div>
	</nav>
	<!-- end: Header -->

	<div class="container-fluid mimin-wrapper">

		<!-- start:Left Menu -->
		<div id="left-menu">
			<div class="sub-left-menu scroll">
				<ul class="nav nav-list">
					<br>
					<li><a href="<?php echo site_url('Dashboard') ?>"><span class="fa fa-home"></span>Dashborad</a></li>
					<li><a href="<?php echo site_url('Jadwal') ?>"><span class="fa fa-calendar-o"></span>Jadwal Dokter</a></li>
					<?php if ($this->session->userdata('level') == 'admin') : ?>
						<li><a href="<?php echo site_url('Dokter') ?>"><span class="fa fa-hospital-o"></span>Dokter</a></li>
						<li><a href="<?php echo site_url('Jenis_berobat') ?>"><span class="fa fa-pencil-square-o"></span>Jenis Berobat</a></li>
						<li><a href="<?php echo site_url('Pendaftaran/pasien') ?>"><span class="fa fa-user icon-sign-out"></span>Pasien</a></li>
						<li><a href="<?php echo site_url('Pendaftaran') ?>"><span class="fa fa-user icon-sign-out"></span>Pendaftaran</a></li>
						<li><a href="<?php echo site_url('laporan') ?>"><span class="fa fa-table "></span>Laporan</a></li>
					<?php endif; ?>
					<?php if ($this->session->userdata('level') == 'user') : ?>
						<li class="ripple"><a href="<?php echo site_url('Pendaftaran/kunjungan') ?>"><span class="fa fa-user icon-sign-out"></span>Pendaftaran Kunjungan</a></li>
					<?php endif; ?>
					<li class="ripple"><a href="<?php echo site_url('Auth/Logout') ?>"><span class=" fa fa-sign-out icon-sign-out"></span>Logout</a></li>
				</ul>
			</div>
		</div>
		<!-- end: Left Menu -->
	</div>

	<!-- start: content -->
	<div id="content">
		<?php echo $contents ?>
	</div>
	<!-- end: content -->


	<!-- start: Mobile -->

	<!-- start: Javascript -->
	<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery.ui.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

	<script src="<?php echo base_url() ?>assets/js/plugins/jquery.datatables.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/plugins/datatables.bootstrap.min.js"></script>

	<!-- plugins -->
	<script src="<?php echo base_url() ?>assets/js/plugins/moment.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/plugins/jquery.vmap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/plugins/maps/jquery.vmap.world.js"></script>
	<script src="<?php echo base_url() ?>assets/js/plugins/jquery.vmap.sampledata.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


	<!-- custom -->
	<script src="<?php echo base_url() ?>assets/js/main.js"></script>
	<script type="text/javascript">
		(function(jQuery) {
			jQuery('.maps').vectorMap({
				map: 'world_en',
				backgroundColor: null,
				color: '#fff',
				hoverOpacity: 0.7,
				selectedColor: '#666666',
				enableZoom: true,
				showTooltip: true,
				values: sample_data,
				scaleColors: ['#C8EEFF', '#006491'],
				normalizeFunction: 'polynomial'
			});

			// end: Maps==============

		})(jQuery);

		$(document).ready(function() {
			$('#datatables-example').DataTable();
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.nama_pasien').select2();
		});
	</script>
	<!-- end: Javascript -->
</body>

</html>
