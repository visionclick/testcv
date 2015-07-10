# Prueba para el puesto de trabajo en Vision Click

Holas, 
Hay que crear un pequeño sistema de comentarios, ahora mismo esta creado el back end y front end de las noticias y tambien el modelo del comentario, ya que el modelo esta con Datamapper. La Realización es que cuando accedes a la noticia hay un formulario en html que hay que completar para enviar a la base de datos y luego mostrarlo tango Back End o Administrador y tambien en la misma pagina de la noticia que ahora mismo esta todo maquetado, solamente habría que hacer una llamada en controladro noticia y hacer un `foreach` en la plantilla.

## Documentarion

* [Codeigniter](http://www.codeigniter.com/userguide2/)
* [Datamapper](http://datamapper.wanwizard.eu/) 

## Tutoriales

* (http://www.mediavida.com/foro/dev/datamapper-object-relational-mapper-codeigniter-406894)
* (http://uno-de-piera.com/datamapper-un-orm-para-codeigniter/)

## Documentation and Examples

Go to [home of Gas ORM](http://gasorm-doc.taufanaditya.com "home of Gas ORM") for full guide about convention and in-depth usage.

## Running the Test Suite

Set appropriate values on both **config/testing/database.php** and phpunit configuration you used (check **CI_VERSION**, **APPPATH** and **BASEPATH**) based by your own machine configuration. Then you could run the test, for example you use MySQL database :

	phpunit --configuration /path/to/third_party/gas/tests/travis/mysql.travis.xml --coverage-text

Gas ORM is well-tested and the latest build status could be found on the top of this document.


[FlattrLink]: https://flattr.com/submit/auto?user_id=toopay&url=https://github.com/toopay/gas-orm&title=Gas%20ORM&language=en_GB&tags=codeigniter%20orm&category=software
[FlattrButton]: http://api.flattr.com/button/button-static-50x60.png
