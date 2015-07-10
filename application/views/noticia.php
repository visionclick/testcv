                <!-- Blog Post -->

                <!-- Title -->
                <h1><?=$noticia->titular?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?=ucfirst($usuario->nombre)?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span><?=fecha_normal($noticia->fecha)?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="<?=site_url($foto->ruta)?>" alt="">

                <hr>

                <!-- Post Content -->
                
                <p><?=$noticia->texto?></p>
    

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Escribe un comentario:</h4>
                    <form role="form" method="post" action="">
                    <div class="form-group">
                            <label for="">Nombre:</label>
                            <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                            <label for="">Email:</label>
                            <input type="text" name="email" id="email" class="form-control">
                    </div>

                        <div class="form-group">
                            <label for="">Mensaje:</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <div class="media-body">
                        <h4 class="media-heading">Usuario
                            <small>25 de agosto 2015 </small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
                 <div class="media">
                    <div class="media-body">
                        <h4 class="media-heading">Usuario
                            <small>25 de agosto 2015 </small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>


