<div id="formulariofotos">
	<div class="listadofotos">
		<h3>Seleccione una imágen del banco de imágenes</h3>
		<?foreach($fotos as $foto){?>
			<div class="miniatura">
				<?if (!isset($slider)){?>
				<a href="<?=site_url('admin/noticias/asignarFoto/'.$noticia->id.'/'.$foto->id)?>">
				<?}else{?>
					<a href="<?=site_url('admin/noticias/asignarFotoSlider/'.$noticia->id.'/'.$slider->id.'/'.$foto->id)?>">
				<?}?>
					<img src="<?=site_url($foto->ruta)?>"  width="100" height="100" />
				</a>
				<small>#<?=$foto->identificador?> &bull; <?=$foto->nombre?></small>
			</div>
		<?}?>
	</div>
	<div class="formulario">
		<form method="post" action="<?if (!isset($slider)){ echo site_url('admin/noticias/guardarFoto/'); }else{ echo site_url('admin/noticias/guardarFotoSlider/'); }?>" enctype="multipart/form-data">
			<input type="hidden" name="idnoticia" value="<?=$noticia->id?>" />
			<?if (isset($slider)){?>
				<input type="hidden" name="idslider" value="<?=$slider->id?>" />
			<?}?>
			<h3>o añada una nueva imagen desde su PC</h3>
			
			

			<p><label for="nombre">Nombre</label>
				<input type="text" name="nombre" value="" class="text-input medium-input" />
				<small>Opcional</small>
			</p>

			<p><label for="identificador">Identificador</label>
				<input type="text" name="identificador" value="" class="text-input medium-input" />
				<small>Opcional</small>
			</p>

			<p>			
				<input type="file" name="imagen" />			
			</p>

			<p>
				<input type="submit" class="button" value="Añadir" />
			</p>
		</form>
	</div>
	<div class="clear"></div>
</div>