<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
		<h3>Gestión de usuarios</h3>
		<ul class="content-box-tabs">
			<li><a href="#tab1" class="default-tab">Tabla</a></li> <!-- href must be unique and match the id of target div -->
			<!--<li><a href="#tab2">Forms</a></li>-->
		</ul>
		<div class="clear"></div>					
	</div> <!-- End .content-box-header -->
				
	<div class="content-box-content">
		<?if (isset($privilegios['creacion_usuario'])){?>
		<p style="text-align:right"><a class="button" href="<?=site_url('admin/usuarios/edicion/')?>" >Crear nuevo usuario</a></p>
		<?}?>
		<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->									
			<table>
				<thead>
					<tr>
					
						<th>Usuario</th>
						<th>Email</th>						
						<th>Acciones</th>						
					</tr>								
				</thead>

						 
				<tbody>
					<?foreach($usuarios as $usuario){?>
					<tr>
						<td><?=$usuario->usuario?></td>
						<td><?=$usuario->email?></td>

		
						<td>

							<a class="button" href="<?=site_url('admin/usuarios/edicion/'.$usuario->id)?>" >Editar</a>&nbsp;&nbsp;
							<?if (isset($privilegios['eliminar_usuario'])){?>
							<a class="button" href="<?=site_url('admin/usuarios/eliminar/'.$usuario->id)?>" >Eliminar</a>
							<?}?>
							<!-- Icons -->
							<!-- <a href="#" title="Edit"><img src="<?=base_url()?>images/icons/pencil.png" alt="Edit" /></a>
							 <a href="#" title="Delete"><img src="<?=base_url()?>images/icons/cross.png" alt="Delete" /></a> 
							 <a href="#" title="Edit Meta"><img src="<?=base_url()?>images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
							 -->
						</td>
					</tr>
					<?}?>
					
								
				</tbody>							
			</table>
						
		</div> <!-- End #tab1 -->
					
	</div> <!-- End .content-box-content -->
				
</div> <!-- End .content-box -->

