<ul class="menu">
	<li><a href="<?=site_url('admin/bienvenida')?>">Inicio</a></li>

	<?if (isset($privilegios['textos'])){?>
		<li><a href="<?=site_url('admin/textos/')?>">Textos</a></li>
	<?}?>

</ul>