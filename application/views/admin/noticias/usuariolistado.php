<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
		<h3>Gestión de usuarios
		</h3>	
		<ul class="content-box-tabs">
			<li><a href="#tab1" class="default-tab">Tabla</a></li> <!-- href must be unique and match the id of target div -->
			<!--<li><a href="#tab2">Forms</a></li>-->
		</ul>
		<div class="clear"></div>					
	</div> <!-- End .content-box-header -->
				
	<div class="content-box-content">
		<p style="text-align:right"><a class="button" href="<?=base_url()?>admin/noticias/edicionusuario/" >Crear nuevo usuario</a></p>
		<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->									
			<table>
				<thead>
					<tr>
					
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Foto</th>
						<th>Acciones</th>						
					</tr>								
				</thead>

				<tbody>
					<?foreach($usuarios as $usuario){

						$newUsuario=new UsuarioNoticia($usuario->id);
						$foto=$newUsuario->foto->get();
						
					?>																			
					<tr>
						<td><?=$usuario->nombre?></td>
						<td><?=word_limiter($usuario->description,10)?></td>
						<td>
						<?
						if(file_exists($foto->ruta))
						{?>
							 <p><img height="50" src="<?=site_url($foto->ruta)?>" /></p>
						<?}?>
						
						</td>
						<td>
							<a class="button" href="<?=base_url()?>admin/noticias/edicionusuario/<?=$usuario->id?>">Editar</a>&nbsp;&nbsp;

							<a class="button" href="<?=base_url()?>admin/noticias/eliminarUsuario/<?=$usuario->id?>" >Eliminar</a>
							 
						</td>
					</tr>
					<?}?>
				</tbody>							
			</table>
						
		</div> <!-- End #tab1 -->
					
	</div> <!-- End .content-box-content -->
				
</div> <!-- End .content-box -->