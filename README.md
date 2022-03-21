# Administrador Genérico

Para la gran mayoría de las personas que quieren tener una aplicación web, es necesario contar con un administrador que permita gestionar el ingreso, registro de usuarios nuevos y olvido de contraseña, lo cual nos toma bastante tiempo para llevar a cabo.

El administrador presentado a continuación permite obtener la primera parte de una aplicación web, con los elementos básicos para realizar un desarrollo ágil sin preocuparse por el módulo de externo de cara al usuario final. Únicamente basta con descargar los archivos, configurar de acuerdo con las necesidades y utilizar.

La base del código del admistrador es AdminLTE y se han realizado modificaciones para añadirle funcionalidad con los lenguajes de programación PHP y Javascript.

## Estructura

El sistema cuenta con los siguientes elementos:

### Ingreso
Valida la identificación del usuario mediante el correo electrónico y la contraseña.- Registro

![](https://williamrico.com/img/admin/login.png)

### Registro
Se digitan los datos requeridos para crear un usuario nuevo. Luego de esto llega un correo al usuario para realizar el ingreso.

![](https://williamrico.com/img/admin/signup.png)

![](https://williamrico.com/img/admin/created_user.png)

### Olvido de contraseña
Es necesario que el usuario ingrese su correo electrónico, al cual llega un mensaje para que pueda realizar el cambio.

![](https://williamrico.com/img/admin/reminder.png)

![](https://williamrico.com/img/admin/send_reminder.png)

![](https://williamrico.com/img/admin/change_password.png)

![](https://williamrico.com/img/admin/changed_password.png)

### Página principal al interior de la aplicación
Esta página es la que visualiza el usuario una vez haya superado la verificación inicial.

![](https://williamrico.com/img/admin/home_page.png)

## Carpetas

- change: Scripts necesarios para gestionar el olvido de contraseña.
- config: Contiene los datos de configuración de la aplicación.
- email: Scripts para envío de los correos y HTML para enviar.
- external: Cuenta con los archivos que se muestran al usuario.
- general: Contiene los scripts que son comunes a todos los archivos, tales como el encabezado, pie de página, menú, barra lateral, entre otros.
- home: Contiene la página que visualiza el usuario una vez haya realizado el ingreso de forma satisfactoria.
- tools: Contiene las herramientas, imágenes y librerías necesarias para el funcionamiento del sistema.
- user: Scripts necesarios para gestionar el ingreso, registro y olvido de contraseña del usuario.

## Instalación
Para utilizar la aplicación es necesario crear un archivo en la carpeta config, el cual se denomina app.php y contiene las siguientes variables de acuerdo con los datos de la máquina en la cual se va a utilizar.

```php
<?php
/**
**********************************************************************
* @author William Jammirlhey Rico Ruiz <webmaster@williamrico.com>
* @date Monday, July 05, 2021
* @file app.php
* @version 0.1
***********************************************************************/
$App=new stdclass();
$App->idmodule=<numero_modulo>;
$App->route='./libraries/';
$App->dbhost=<direccion_host>;
$App->dbport=<puerto_host>;
$App->dbuser=<usuario_host>;
$App->dbpass=<contraseña_host>;
$App->dbname=<nombre_de_la_base_de_datos>;
$App->libs='../tools/libs/';
// Ruta de ubicación del archivo principal o servidor
$App->mainRoute=<ubicación_archivo_principal>;
// Información para PHPMailer
$App->mailHost=<direccion_servidor_smtp>;
$App->mailPort=<puerto_servidor_smtp>;
$App->mailUser=<usuario_de_envio>;
$App->mailPass=<contraseña_del_usuario>;
?>
```

De igual manera la base de datos debe tener los siguientes datos escenciales para su funcionamiento.

```sql
CREATE TABLE `gene01tercero` (
  `gene01id` int(11) NOT NULL DEFAULT 0,
  `gene01tipodoc` varchar(2) NOT NULL DEFAULT '',
  `gene01doc` varchar(15) NOT NULL DEFAULT '',
  `gene01nombre1` varchar(30) NOT NULL DEFAULT '',
  `gene01nombre2` varchar(30) NOT NULL DEFAULT '',
  `gene01apellido1` varchar(30) NOT NULL DEFAULT '',
  `gene01apellido2` varchar(30) NOT NULL DEFAULT '',
  `gene01nombrecomp` varchar(100) NOT NULL DEFAULT '',
  `gene01fechanaci` int(11) NOT NULL DEFAULT 0,
  `gene01correoinst` varchar(50) NOT NULL DEFAULT '',
  `gene01correopers` varchar(50) NOT NULL DEFAULT '',
  `gene01direccion` varchar(100) NOT NULL DEFAULT '',
  `gene01clave` varchar(100) NOT NULL DEFAULT '',
  `gene01fechacrea` int(11) NOT NULL DEFAULT 0,
  `gene01fechamodi` int(11) NOT NULL DEFAULT 0,
  `gene01estado` int(11) NOT NULL DEFAULT 0,
  `gene01token` varchar(10) NOT NULL DEFAULT '',
  `gene01requierepass` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `gene01tercero`
  ADD PRIMARY KEY (`gene01id`);
```