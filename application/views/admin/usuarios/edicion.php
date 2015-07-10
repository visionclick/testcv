<form action="<?=site_url('admin/usuarios/guardar')?>" method="post">
<?/*Mostramos el formulario*/?>
<div class="content-box column-left">
		
	<div class="content-box-header">					
		<h3>Edición de usuario</h3>					
	</div> <!-- End .content-box-header -->				
	<div class="content-box-content">					
		<div class="tab-content default-tab">

			
				<input type="hidden" name="idusuario" value="<?=$usuario->id?>" />
				<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->		
					<p>
						<label>Usuario</label>
						<input class="text-input medium-input" type="text" id="usuario" name="usuario" value="<?=$usuario->usuario?>" placeholder="Campo obligatorio" />
					</p>
					
					<p>
						<label>Contraseña</label>
						<input class="text-input medium-input" type="password" id="password" name="password" placeholder="Entre 4 y 6 caractéres" value=""/>
						<br /><?if ($usuario->id){?><small>Dejar vacio para mantener contraseña actual</small><?}?>
					</p>
					<p>
						<label>Email</label>
						<input class="text-input medium-input" type="email" id="email" name="email" value="<?=$usuario->email?>" placeholder="No es obligatorio" />
					</p>

					<p>
						<input class="button" type="submit" value="Guardar cambios" />
					</p>
					
				</fieldset>	
				<div class="clear"></div><!-- End .clear -->
				
			
		</div>
	</div>
</div>



<?/*Mostramos el formulario*/?>
<div class="content-box column-right">
		
	<div class="content-box-header">					
		<h3>Privilegios de usuario</h3>					
	</div> <!-- End .content-box-header -->				
	<div class="content-box-content">					
		<div class="tab-content default-tab privilegios">
			<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->		
			<?foreach($todosprivilegios as $privilegio){?>
				<div>
				<input <?=(($usuario->id and $privilegio->is_related_to($usuario)) ? 'checked' : '')?> type="checkbox" name="privilegios[]?>" id="<?=$privilegio->id?>" value="<?=$privilegio->id?>" /><label for="<?=$privilegio->id?>"><?=$privilegio->privilegio?></label>
				</div>
			<?}?>
			</fieldset>	
			<div class="clear"></div><!-- End .clear -->	
			
		</div>
	</div>
</div>
</form>
<div class="clear"></div><!-- End .clear -->