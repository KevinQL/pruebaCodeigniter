# pruebaCodeigniter

# APUNTES FRAMEWORK 

* Funcion base url para imprimir la ruta del proyecto. 
base_url();
base_url("index.php/registro");


* carpeta para configurar ruta pricipal por defecto:
> config/routes   // pagina por defecto


* activar url amigables. En el archivo de configuración php
habilitar el mdulo: mod_rewrite()

* modificar la base_url
en config/config.php     
------  antes     :::    despues  ---------
$config['base_url'] = '';  :::  $config['base_url'] = 'http://localhost/testcode';

* si es modo rewrite entonces dejamos en blanco
$config['index_page'] = 'index.php';    :::    $config['index_page'] = '';

* Helper autoload. Cargr los helper en todo el projecto, haciendo que no sea necesario la llamada en el contructor de la clase.
modif file in => config/autoload

