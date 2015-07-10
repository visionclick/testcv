# Prueba para el puesto de trabajo en Vision Click

Holas, 
Hay que crear un pequeño sistema de comentarios, ahora mismo esta creado el back end y front end de las noticias y tambien el modelo del comentario, ya que el modelo esta con Datamapper. La pureba consiste es que cuando accedes a la noticia hay un formulario en html que hay que completar para enviar a la base de datos el comentario y luego mostrarlo tango Back End o Administrador(tanto el listado como la edición del comentario) y tambien en la misma pagina de la noticia que ahora mismo esta todo maquetado, solamente habría que hacer una llamada en el controlador de la noticia y hacer un `foreach` en la plantilla.

## Documentarion

* [Codeigniter](http://www.codeigniter.com/userguide2/)
* [Datamapper](http://datamapper.wanwizard.eu/) 
* La base de datos a importar se ecuentra en la raiz con el nombre bd.sql
* La configuración en la carpeta /application/config/config.php para configuración y para la base de datos en /application/config/database.php
* los modelos se ecuentrar en la caperta  /application/models/ el modelo comentario.php se encuentra comentado
* los vontroladores  en la carpeta  /application/controller/
* las vista en la carpeta application/views/ para el front y para el admin /application/views/admin/
* las funciones extras para aplicar al proyecto /application/helpers/util_helper.php
* 

## Tutoriales

* (http://www.mediavida.com/foro/dev/datamapper-object-relational-mapper-codeigniter-406894)
* (http://uno-de-piera.com/datamapper-un-orm-para-codeigniter/)

## Consultas comunes a la base de datos con Datammaper ORM
```php
 //creamos un nuevo curso en la tabla cursos
  public function add_curso()
  {
    $curso = new Curso();
    $curso->curso = "PHP";
    $curso->precio = "150";
 
    //si se ha podido guardar la estado
    if($curso->save())
    {
      echo "El curso se ha guardado correctamente \n";
    }else{
            foreach ($curso->error->all as $error)
            {
                echo $error;
            }
    }
  }
 
  //guardamos la relacion de un usuario con el curso
  //registro en la tabla cursos_users 
  public function relation_user_curso()
  {
    //creamos un usuario user
    $user = new User();
    //obtenemos un usuario por su username
    $user->where('username', 'unodepiera')->get();
    //también podemos hacer
    //$user->get_by_username('unodepiera');
 
    //creamos un objeto curso
    $curso = new Curso();
 
    //obtenemos un curso
    $curso->where('curso', 'PHP')->get();
 
    //esta es la forma de insertar el nuevo registro, se añade curso en save para guardar la relacion en la tabla cursos_users entre los dos
    if($user->save($curso))
    {
      echo "La curso ha sido asociadO al usuario correctamente";
    }else{
      echo "Ha ocurrido un error";
    }
  }
  
  public function user_relation_curso(){
  $user = new User();
  $curso= new Curso();
  $curso->get_by_id(1);
 // conseguimos los usuario que estan relacionado con el curso que tienen el id 1
  $user->where_related_curso('id', $curso->id)->get()->all;
  print_r($user->stored); //imprime solamente el array de los usuarios con stored

  }
```


## Documentation and Examples

Go to [home of Gas ORM](http://gasorm-doc.taufanaditya.com "home of Gas ORM") for full guide about convention and in-depth usage.

## Running the Test Suite

Set appropriate values on both **config/testing/database.php** and phpunit configuration you used (check **CI_VERSION**, **APPPATH** and **BASEPATH**) based by your own machine configuration. Then you could run the test, for example you use MySQL database :

	phpunit --configuration /path/to/third_party/gas/tests/travis/mysql.travis.xml --coverage-text

Gas ORM is well-tested and the latest build status could be found on the top of this document.


[FlattrLink]: https://flattr.com/submit/auto?user_id=toopay&url=https://github.com/toopay/gas-orm&title=Gas%20ORM&language=en_GB&tags=codeigniter%20orm&category=software
[FlattrButton]: http://api.flattr.com/button/button-static-50x60.png
