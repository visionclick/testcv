<form method="post" action="<?=site_url('admin/noticias/guardarFoto/')?>" enctype="multipart/form-data">
	<input type="hidden" name="idnoticia" value="<?=$noticia->id?>" />
	<input type="hidden" name="idfoto" value="<?=$foto->id?>" />

			

	<p><label for="nombre">Nombre</label>
		<input type="text" name="nombre" value="<?=$foto->nombre?>" class="text-input medium-input" />
		<small>Opcional</small>
	</p>

	<p><label for="identificador">Identificador</label>
		<input type="text" name="identificador" value="<?=$foto->identificador?>" class="text-input medium-input" />
		<small>Opcional</small>
	</p>
	<p><img width="400"  src="<?=site_url($foto->ruta)?>?v=<?=rand(0,9999)?>" /></p>
	<p>			
		<input type="file" name="imagen" />			
	</p>

	<p>
		<input type="submit" class="button" value="Añadir" />
	</p>
</form>