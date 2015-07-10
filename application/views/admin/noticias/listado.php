<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
		<h3>Gestión de Noticias</h3>
		<ul class="content-box-tabs">
			<li><a href="#tab1" class="default-tab">Tabla</a></li> <!-- href must be unique and match the id of target div -->
			<!--<li><a href="#tab2">Forms</a></li>-->
		</ul>
		<div class="clear"></div>					
	</div> <!-- End .content-box-header -->

	<div class="content-box-content">

		<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->						
			
			<table>
				<thead>
					<tr>
						<th>Titular</th>
						<th>Autor</th>
						<th>fecha</th>

						<th>Acciones</th>						
					</tr>								
				</thead>

				<tbody>
					<?foreach($noticias as $noticia){					

						$usuario = new UsuarioNoticia();	

						$usuario->where_related_noticia('id',$noticia->id)->get();

						$fotoUsuario= new Foto();

						$fotoUsuario->where_related_noticia('id',$usuario->id)->get();


						?>
						<tr>
							<td><?=$noticia->titular?></td>
							<td><?=$usuario->nombre?>
								<?if($fotoUsuario->ruta){?>
								<br><img style="max-width:50px;text-align: center;margin: 0 auto;display: block;" src="<?=site_url($fotoUsuario->ruta)?>" alt="">
								<?}?>
							</td>
							<td><?=fecha_normal($noticia->fecha)?></td>

							<td>
								<a class="button" href="<?=site_url('admin/noticias/edicion/'.$noticia->id)?>" >Gestionar</a>&nbsp;&nbsp;
								<a class="button" href="<?=site_url('admin/noticias/eliminar/'.$noticia->id)?>" >Eliminar</a>
							</td>
						</tr>
						<?}?>


					</tbody>							
				</table>

			</div> <!-- End #tab1 -->

		</div> <!-- End .content-box-content -->

</div> <!-- End .content-box -->