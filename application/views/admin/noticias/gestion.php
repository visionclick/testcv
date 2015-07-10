<style type="text/css">
	#main-content  table#selectcategories	{

	}
	#main-content table#selectcategories td{
		padding: 2px;
		line-height: 1;
		vertical-align: middle;
	}
	#main-content table#selectcategories tr{
		background: white;
	}
	#main-content form table#selectcategories label{
		display:initial;
	}
	#main-content form table#selectcategories tbody {
		border: 0;
	}
</style>
<?/*Mostramos el formulario*/?>
<div class="content-box column-left">

	<div class="content-box-header">					
		<h3>Edición de Noticias</h3>					
	</div> <!-- End .content-box-header -->				
	<div class="content-box-content">					
		<div class="tab-content default-tab">
			<?
			$correcto = $this->session->flashdata('correcto');

			if (!empty($correcto)){?>
			<div class="notification success png_bg">
				<a href="#" class="close"><img src="<?=site_url('images/admin/icons/cross_grey_small.png')?>" title="Close this notification" alt="close" /></a>
				<div>
					<?=$correcto?>
				</div>	
			</div>

			<?}
			?>	
			<form action="<?=site_url('admin/noticias/guardar')?>" method="post">
				<input type="hidden" name="idnoticia" value="<?=$noticia->id?>" />
				<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->		
					<p>
						<label>Autor</label>
						<select name="idusuario">
							<?foreach ($usuarios as $usuario) {
								$usuarioNew = new UsuarioNoticia($usuario->id);	
								?>

								<option value="<?=$usuario->id?>" <?=($usuarioNew->is_related_to('noticia',$noticia->id) ? "selected" : "")?>>
									<?=$usuario->nombre?>
								</option>

								<?}?>

							</select>

						</p>
						<p>
							<label>Fecha</label>
							<input class="fechadata text-input small-input" type="text" name="fecha" value="<?=($noticia->fecha ? fecha_normal($noticia->fecha) : '')?>"/> 
							<br />
							<small>(Debe de ser único)</small>
						</p>
						<p>
							<label> Titular </label>
							<input class="text-input large-input" type="text" id="large-input" name="titular" value="<?=$noticia->titular?>"/> 
							<br />

						</p>
						<p>
							<label>Texto</label>
							<textarea class="text-input textarea wysiwyg" id="texto_es" name="texto" cols="79" rows="15"><?=$noticia->texto?></textarea>
						</p>					
						
						<p>
							<label>¿Destacar Noticia?
								<?=form_checkbox('destacada', '1', $noticia->destacada);?>
							</label>
						</p>


						<p>
							<input class="button" type="submit" value="Guardar cambios" />
						</p>

					</fieldset>	
					<div class="clear"></div><!-- End .clear -->

				</form>
			</div>
		</div>

	</div>
	<script>
		$(document).ready(function(){
			CKEDITOR.replace( 'texto_es',
			{
				toolbar : [ [ 'Source', '-', 'Cut', 'Copy', 'Paste', '-', 'Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'NumberedList', 'BulletedList', 'Outdent', 'Indent', '-', 'Link', 'Unlink', 'Anchor', '-' ],
				[ 'Format', 'Image', 'Table', 'HorizontalRule']
				],
				height:250,
				filebrowserBrowseUrl : dominio + 'js/filemanager/index.php',
				filebrowserWindowWidth : '640',
				filebrowserWindowHeight : '500'
			});

		});
	</script> 

	<?/*Mostramos los contenido si la página ya esta creada y estamos editando*/
	if ($noticia->id){
		?>			
		<?/*Lo mismo para las fotos*/?>

		<div class="content-box column-right">				
			<div class="content-box-header">					
				<h3>Fotos de la Noticia</h3>					
			</div> <!-- End .content-box-header -->				
			<div class="content-box-content listadofotos">

				<p style="text-align:right"><a class="button" rel="modal" href="<?=site_url('admin/noticias/imagenesnoticia/'.$noticia->id)?>">Añadir nueva</a></p>
				<?foreach($fotos as $foto){?>
				<div class="miniatura">
				<a href="<?=site_url($foto->ruta)?>" rel="modal"><img src="<?=site_url($foto->ruta)?>"  width="100" height="100" /></a>
					<a rel="modal" href="<?=site_url('admin/noticias/editarFoto/'.$noticia->id.'/'.$foto->id)?>" title="Editar"><img src="<?=base_url()?>images/admin/icons/pencil.png" alt="Editar" /></a>
					<a href="<?=site_url('admin/noticias/eliminarFoto/'.$noticia->id.'/'.$foto->id)?>" title="Eliminar"><img src="<?=base_url()?>images/admin/icons/cross.png" alt="Eliminar" /></a> 
					<small>#<?=$foto->identificador?> &bull; <?=$foto->nombre?></small>

				</div>
				<?}?>	
				<div class="clear"></div>		
			</div>
		</div>

		<div class="clear"></div>
<!--

				<div class="content-box-header">
					
					<h3 style="cursor: s-resize; ">Seo noticia</h3>
					
					<ul class="content-box-tabs">
					<?
						$idiomas=new Idioma();
						$idiomas->where('activo',true)->get();
						foreach($idiomas->all as $idioma)
						{
							
					?>
						<li><a href="#seo_<?=$idioma->codigo?>" class="<?=($idioma->codigo=='es' ? 'default-tab current' : '')?>"><img height="24" src="<?=site_url('images/idiomas/'.$idioma->codigo)?>.png" /></a></li> 
						<?
						}
						?>					
					</ul>
					
					<div class="clear"></div>
					
				</div> 
				
				<div class="content-box-content">					
				<?
				
				foreach($idiomas->all as $idioma)
				{
				
				$contenido=new Contenidonoticia();
				$contenido->where_related('noticia','id',$noticia->id)->where_related('idioma','id',$idioma->id)->get();
				
				?>	
			<div class="tab-content <?=($idioma->codigo=='es' ? 'default-tab' : '')?>" id="seo_<?=$idioma->codigo?>" style="display:block; ">
					
				<form name="formseo<?=$contenido->id?>" action="<?=site_url('admin/noticias/guardarSeo/'.$contenido->id.'')?>" method="post">
				<input type="hidden" name="idnoticia" value="<?=$noticia->id?>" />
				<input type="hidden" name="ididioma" value="<?=$idioma->id?>" />
				<input type="hidden" name="idcontenido" value="<?=$contenido->id?>" />
				<fieldset> 
						
					<p>
						<label> H1</label>
						<input class="text-input large-input" type="text" id="large-input" name="h1" value="<?=$contenido->h1?>"/> 
						<br />
						
					</p>
					<p>
						<label> Title</label>
						<input class="text-input large-input" type="text" id="large-input" name="title" value="<?=$contenido->title?>"/> 
						<br />
						
					</p>
					<p>
						<label> Description</label>
						<input class="text-input large-input" type="text" id="large-input" name="description" value="<?=$contenido->description?>"/> 
						<br />
						
					</p>
					<p>
						<label> Keywords</label>
						<input class="text-input large-input" type="text" id="large-input" name="keywords" value="<?=$contenido->keywords?>"/> 
						<br />
						
					</p>
									
						
					<p>
						<input class="button" type="submit" value="Guardar cambios" />
					</p>
					
				</fieldset>	
				<div class="clear"></div>
				
			</form>

							
						
					</div> 
				<?}?>	
				</div>
			-->
			<?}?>				
			
			<div class="clear"></div><!-- End .clear -->
