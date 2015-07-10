<li>
	<a href="<?=site_url('admin/')?>" class="nav-top-item no-submenu <?=($menuActual=="inicio" ? 'current' : '')?>"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
		Inicio
	</a>       
</li>
<li> 
	<a href="#" class="nav-top-item <?=(($menuActual=='noticias' or $menuActual=='categoriasnoticias') ? 'current' : '')?>"> <!-- Add the class "current" to current menu item -->
		Noticias
	</a>
	<ul>
		<li><a href="<?=site_url('admin/noticias/edicionusuario')?>">Crear nuevo usuario</a></li>
		<li><a href="<?=site_url('admin/noticias/usuariolistado')?>">Gestionar usuarios</a></li>
		<li><a href="<?=site_url('admin/noticias/edicion') ?>">Escribir nueva noticia</a></li>
		<li><a href="<?=site_url('admin/noticias/listado') ?>">Gestionar noticias</a></li>

	</ul>
</li>

<li> 
	<a href="#" class="nav-top-item <?=(($menuActual=='comentarios') ? 'current' : '')?>"> <!-- Add the class "current" to current menu item -->
		Comentarios
	</a>
	<ul>
		<li><a href="<?=site_url('admin/comentarios/edicion') ?>">Escribir nueva noticia</a></li>
		<li><a href="<?=site_url('admin/comentarios/listado') ?>">Gestionar noticias</a></li>

	</ul>
</li>
<?if (isset($privilegios['usuarios'])){?>
<li>
	<a href="#" class="nav-top-item <?=($menuActual=='usuarios' ? 'current' : '')?>">
		Usuarios
	</a>
	<ul>
	<?if (isset($privilegios['creacion_usuario'])){?>
		<li><a href="<?=site_url('admin/usuarios/edicion')?>">Crear nuevo usuario</a></li>
	<?}?>
		<li><a href="<?=site_url('admin/usuarios/listado')?>">Gestionar usuarios</a></li>
	</ul>
</li>
<?}?> 