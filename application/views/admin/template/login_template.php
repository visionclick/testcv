<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<title>TEST JOB | Sign In</title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="<?=base_url()?>css/admin/reset.css" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="<?=base_url()?>css/admin/style.css" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="<?=base_url()?>css/admin/invalid.css" type="text/css" media="screen" />	
		<link rel="stylesheet" href="<?=base_url()?>css/admin/blue.css" type="text/css" media="screen" />
		
		<!-- Colour Schemes
	  
		Default colour scheme is green. Uncomment prefered stylesheet to use it.
		
		<link rel="stylesheet" href="<?=base_url()?>css/admin/blue.css" type="text/css" media="screen" />
		
		<link rel="stylesheet" href="<?=base_url()?>css/admin/red.css" type="text/css" media="screen" />  
	 
		-->
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="<?=base_url()?>css/admin/ie.css" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
	  
		<!-- jQuery -->
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
		<script>
			$(document).ready(function(){
				
				$(":input:first").focus();

			});
		</script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="<?=base_url()?>js/libs/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="<?=base_url()?>js/libs/facebox.js"></script>
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="<?=base_url()?>js/libs/jquery.wysiwyg.js"></script>
		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="<?=base_url()?>js/libs/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		
	</head>
  
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<h1>Admin <?=date('Y')?></h1>
				<!-- Logo (221px width) -->
			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				
				<form action="<?=site_url('admin/inicio/loguear')?>" method="post">
					<?$error = $this->session->flashdata('error');
					if (!empty($error)){?>
					<div class="notification error png_bg">
						<div>
							<?=$error?>
						</div>
					</div>
					<?}?>
					
					<p>
						<label>Usuario</label>
						<input class="text-input" type="text" name="usuario"/>
					</p>
					<div class="clear"></div>
					<p>
						<label>Contraseña</label>
						<input class="text-input" type="password" name="password"/>
					</p>
					<div class="clear"></div>
					<!-- <p id="remember-password">
						<input type="checkbox" />Remember me
					</p>-->
					<div class="clear"></div>
					<p>
						<input class="button" type="submit" value="Acceder" />
					</p>
					
				</form>
			</div> <!-- End #login-content -->
			
		</div> <!-- End #login-wrapper -->
		
  </body>
  
</html>
