<?
$CI =& get_instance();
$class = $CI->router->class;  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 
	<head>
		
		<meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
		<script>
			dominio = '<?=base_url()?>';
			var _BASE_URL = '<?=base_url()?>';
		</script>
		<title>Administrador TEST JOB</title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="<?=base_url()?>css/admin/reset.css" type="text/css" media="screen" />
	  	
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="<?=base_url()?>css/admin/style.css" type="text/css" media="screen" />
	
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="<?=base_url()?>css/admin/invalid.css" type="text/css" media="screen" />	
		<link rel="stylesheet" href="<?=base_url()?>css/admin/blue.css" type="text/css" media="screen" />
		<link type="text/css" href="<?=base_url()?>css/ui-lightness/jquery-ui-1.8.5.custom.css" rel="stylesheet" />
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="<?=base_url()?>css/admin/ie.css" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
  
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery-1.8.1.min.js"></script> 
		<!-- jQuery UI Data piker -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script>
		<!--google-->
		<!-- Facebox jQuery Plugin -->
		

		<script type="text/javascript" src="<?=base_url()?>js/libs/facebox.js"></script>

		<script src="<?=site_url('js/ckeditor/ckeditor.js')?>"></script>
		<script src="<?=site_url('js/ckeditor/adapters/jquery.js')?>"></script>
		<script type="text/javascript" src="<?=site_url('js/ckfinder/ckfinder.js')?>"></script>
		<!-- jQuery Configuration -->
		<!--
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
	-->
		<!-- jQuery Configuration -->

		<script type="text/javascript" src="<?=base_url()?>js/libs/simpla.jquery.configuration.js"></script> 


		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="<?=base_url()?>js/libs/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		

	</head>
  
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title"><a href="<?=site_url('admin')?>">Administración <?=date('Y')?></a></h1>
		  
			<!-- Logo (221px wide) -->
			<a href="<?=site_url('admin')?>">
			</a>
		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				Hola <?=ucfirst($this->session->userdata('user')->usuario)?><br />
				<br />
				<a target="blank" href="<?=base_url()?>" title="Ver la portada de la web">Ver página</a> | <a href="<?=site_url('admin/inicio/salir')?>" title="Salir de la administración">Salir</a>
			</div>        
			
			<ul id="main-nav">  <!-- Accordion Menu -->
				<?$this->load->view('admin/menu_admin')?>				
			</ul> <!-- End #main-nav -->
			

			
		</div></div> <!-- End #sidebar -->
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<?/**/?>			
			<!-- Page Head -->

			<?$this->load->view($vista)?>
			<?
			/**
			**/?>


			<div id="footer">
				<small>
						&#169; Copyright <?=date('Y')?> |  Panel de administración  | <a href="#">Volver</a>
				</small>
			</div><!-- End #footer -->
		</div> <!-- End #main-content -->
		
	</div></body>
  
</html>
