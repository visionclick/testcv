
<h1 class="page-header">
    Noticias
    <small>Test de Noticias</small>
</h1>
<?foreach ($noticias as $noticia) {
     $usuario = new UsuarioNoticia();    
     $usuario->where_related_noticia('id',$noticia->id)->get();
     $foto = new Foto();    
     $foto->where_related_noticia('id',$noticia->id)->get();

?>
<!-- First Blog Post -->
<h2>
    <a href="<?=site_url('noticias/' . url_title($noticia->titular) . '-id-' . $noticia->id . '') ?>.html">
    <?=$noticia->titular?></a>
</h2>
<p class="lead">
    by <a href="#"><?= ucfirst($usuario->nombre)?></a>
</p>
<p><span class="glyphicon glyphicon-time"></span> <?=fecha_normal($noticia->fecha)?>
</p>
<hr>
<img class="img-responsive" src="<?=site_url($foto->ruta) ?>" alt="">
<hr>
<p>
<?=$noticia->texto?>
</p>
<a class="btn btn-primary" href="<?=site_url('noticias/' . url_title($noticia->titular) . '-id-' . $noticia->id . '') ?>.html">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

<hr>
<?}?>


<!-- Pager -->
<ul class="pager">
    <li class="previous">
        <a href="#">&larr; Older</a>
    </li>
    <li class="next">
        <a href="#">Newer &rarr;</a>
    </li>
</ul>