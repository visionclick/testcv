# Prueba para el puesto de trabajo en Vision Click

Buenas,

Hay que realizar un pequeño sistema de comentarios con CodeIgniter, ahora mismo está creado el **back end y front end** de las noticias y tambien el modelo del **comentario**, el cual está implementado con *Datamapper*. La prueba consiste en que cuando accedes a la noticia hay un formulario en *html* que hay que completar para enviar por *POST* e insertar en la tabla comentario y ralacionarlo con la noticia, e igualmente luego mostrar el listado y edición del comentario en el administrador y en la misma pagina de la noticia. Ahora mismo esta todo maquetado, solamente habría que hacer una llamada en el controlador de la noticia y hacer un `foreach` en la plantilla para mostrar los comentarios relacionado con la noticia.

## Documentacion

* [Codeigniter](http://www.codeigniter.com/userguide2/)
* [Datamapper](http://datamapper.wanwizard.eu/) 
* La base de datos a importar se ecuentra en la raiz con el nombre `bd.sql`
* La configuración en la carpeta `/application/config/config.php` para configuración y para la base de datos en `/application/config/database.php`
* los modelos se ecuentrar en la caperta  `/application/models`/ el modelo `comentario.php` se encuentra comentado
* los controladores  en la carpeta  `/application/controller/`
* las vista en la carpeta application/views/ para el front y para el admin `/application/views/admin/`
* las funciones extras para aplicar al proyecto `/application/helpers/util_helper.php`
* la vista del menu del administrador se encuentra en `/application/views/admin/menu_admin.php`


## Pasos

* Descargar el respositorio completo `testcv`
* Importar la base datos sql que está en la raiz
* Configurar los datos sql de coneccion en el archivo `/application/config/database.php`.
* Acceso al administrador en directorio local o servidor `dominio.local/admin`
* Datos de acceso `user: admin pass:admin`
* Completar el controlador comentarios
* Completar las vistas de gestion y listado de la carpeta `/views/admin/comentarios`
* Crear dos o 3 comentarios de ejemplos.
* Mostrar los comentarios realacionado con la noticia  en el front end de la vista `noticia.php`
* Hacer que el formulario funcione en la vista `noticia.php` para comentar directamente desde la vista del comentario.

## Entrega
* Una vez finalizado todo, comprimir los ficheros y exportar la base de datos en en formato .sql y enviar a josecarlos@visionclick.es
* Fecha límite de entrega: 14 de Julio a las 12:00 h.
* Para cualquier duda con la entrega o la realización consultar por email a josecarlos@visionclick.es

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


