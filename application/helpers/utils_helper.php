<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if (! function_exists('mostrar')){
  function mostrar($templante='templante',$vista,$datos = array()){
    $CI = & get_instance();
    $datos['vista'] = $vista;
    $CI->load->view('template/'.$templante.'',$datos);
  }
}

if (! function_exists('numberfix')){
  function numberfix($number)
  { 
      if($number==0)
        return "Llamar para consultar precio";
    $number = number_format($number, 0, '', '.');
    return str_replace(" ", "&nbsp;", $number)." € ";

  }
}
if (! function_exists('limpiarnumeros')){
  function limpiarnumeros($number)
  {
    $caracteres = Array(".",","); 
    $numero =str_replace($caracteres,"",$number); 

    return $numero;
  }
}

if (!function_exists('ultimaVersion')){
 function ultimaVersion($url){
  if (!file_exists($url))
   echo("El fichero <strong>$url</strong> no existe.");

 $ultimaModificacion = filemtime($url);
 return site_url("{$url}?v=".$ultimaModificacion);
}
}

if (! function_exists('mostrarAdmin')){
  function mostrarAdmin($vista,$datos = array()){
    $CI = & get_instance();
    $datos['vista'] = $vista;
    $CI->load->view('admin/template/template',$datos);
  }
}
////////////////////////////////////////////////////
//Convierte fecha de mysql a normal
////////////////////////////////////////////////////
if(! function_exists('fecha_normal'))
{
  function fecha_normal($fecha){
    preg_match( "/([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})/", $fecha, $mifecha);
    $lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1];
    return $lafecha;
  }
}
////////////////////////////////////////////////////
//Convierte fecha de normal a mysql
////////////////////////////////////////////////////
if(! function_exists('fecha_mysql'))
{
  function fecha_mysql($fecha){
    preg_match( "/([0-9]{1,2})-([0-9]{1,2})-([0-9]{2,4})/", $fecha, $mifecha);
    $lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1];
    return $lafecha;
  }
} 

if (! function_exists('static_url')){
  function static_url($url = ''){
    $CI = & get_instance();
    return $CI->config->item('static_url').$url;
  }
}


/*Esta funcion acelera el rellenado de opciones en los select. Se le pasa el array, el nombre del campo para mostrar
en el option y el del value.*/
if (!function_exists('options')){
  function options($array,$value,$key,$selected = null){
    if ($array)
      foreach($array as $item)
        echo '<option '.($selected == $item->{$key} ? 'selected' :'').' value="'.$item->{$key}.'">'.$item->{$value}.'</option>
      ';
    }
  }


  if (!function_exists('isLogged')){
    function isLogged(){
      $CI = & get_instance();

      return $CI->session->userdata('user')  != NULL;
    }
  }


  if (!function_exists('isAjax')){
    function isAjax(){
      return !((!isset($_SERVER['REDIRECT_URL']) or substr($_SERVER['REDIRECT_URL'],-3) != 'jpg') and !(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'));
    }
  }


  if (!function_exists('arrayIdentificador')){
    function arrayIdentificador($elementos){
      $nuevo = array();
      foreach($elementos as $elemento){
        $nuevo[$elemento->identificador] = $elemento->stored;
        $nuevo[$elemento->identificador]->foto = $elemento->foto; 

      }


      return $nuevo;
    }
  }

  if (!function_exists('arraySlider')){
    function arraySlider($sliders){
      $nuevo = array();
      foreach($sliders as $slider){
        $nuevo[$slider->identificador] = $slider;
        $nuevo[$slider->identificador]->fotos = arrayIdentificador($slider->fotos->get()->all);
      }
      return $nuevo;
    }

  }
  if (!function_exists('validEmail')){
    function validEmail($email)
    {
     $isValid = true;
     $atIndex = strrpos($email, "@");
     if (is_bool($atIndex) && !$atIndex)
     {
      $isValid = false;
    }
    else
    {
      $domain = substr($email, $atIndex+1);
      $local = substr($email, 0, $atIndex);
      $localLen = strlen($local);
      $domainLen = strlen($domain);
      if ($localLen < 1 || $localLen > 64)
      {
         // local part length exceeded
       $isValid = false;
     }
     else if ($domainLen < 1 || $domainLen > 255)
     {
         // domain part length exceeded
       $isValid = false;
     }
     else if ($local[0] == '.' || $local[$localLen-1] == '.')
     {
         // local part starts or ends with '.'
       $isValid = false;
     }
     else if (preg_match('/\\.\\./', $local))
     {
         // local part has two consecutive dots
       $isValid = false;
     }
     else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
     {
         // character not valid in domain part
       $isValid = false;
     }
     else if (preg_match('/\\.\\./', $domain))
     {
         // domain part has two consecutive dots
       $isValid = false;
     }
     else if
      (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/',
       str_replace("\\\\","",$local)))
    {
         // character not valid in local part unless 
         // local part is quoted
     if (!preg_match('/^"(\\\\"|[^"])+"$/',
       str_replace("\\\\","",$local)))
     {
      $isValid = false;
    }
  }

}
return $isValid;
}
}
if (!function_exists('curPageURL')){
  function curPageURL() {
   $pageURL = 'http';
   if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
   $pageURL .= "://";
   if ($_SERVER["SERVER_PORT"] != "80") {
    $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
  } else {
    $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
  }
  return $pageURL;
}
}
if (!function_exists('devuelveFecha')){
  function devuelveFecha ($idioma='en')
  {

   switch ($idioma)
   {
    case 'es':
    $fecha = devuelveDiaEs().', '.date("j") . ' ' .devuelveMesEs() .date(" Y H:i");
    break;
    case 'en':
    $fecha = date("l, j F Y H:i");
    break;
    default:
    break;
  }

  return $fecha;
}
}
if (!function_exists('devuelveDiaEs')){
  function devuelveDiaEs ()
  {
   switch (date("N"))
   {
    case 1:
    $dia_semana = 'Lunes'; 
    break;
    case 2:
    $dia_semana = 'Martes'; 
    break;
    case 3:
    $dia_semana = 'Miércoles'; 
    break;
    case 4:
    $dia_semana = 'Jueves'; 
    break;
    case 5:
    $dia_semana = 'Viernes'; 
    break;
    case 6:
    $dia_semana = 'Sábado'; 
    break;
    case 7:
    $dia_semana = 'Domingo'; 
    break;
    default:
    $dia_semana = '';
    break;
  }
  return $dia_semana;
}
}
if (!function_exists('devuelveMesEs')){
  function devuelveMesEs ()
  {
   switch (date("n"))
   {
    case 1:
    $mes_actual = 'Enero'; 
    break;
    case 2:
    $mes_actual = 'Febrero'; 
    break;
    case 3:
    $mes_actual = 'Marzo'; 
    break;
    case 4:
    $mes_actual = 'Abril'; 
    break;
    case 5:
    $mes_actual = 'Mayo'; 
    break;
    case 6:
    $mes_actual = 'Junio'; 
    break;
    case 7:
    $mes_actual = 'Julio'; 
    break;
    case 8:
    $mes_actual = 'Agosto'; 
    break;
    case 9:
    $mes_actual = 'Septiembre'; 
    break;
    case 10:
    $mes_actual = 'Octubre'; 
    break;
    case 11:
    $mes_actual = 'Noviembre'; 
    break;
    case 12:
    $mes_actual = 'Diciembre'; 
    break;
    default:
    $mes_actual = '';
    break;
  }
  return $mes_actual;
}

}


