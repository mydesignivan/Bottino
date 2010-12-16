<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ', 				'rb');
define('FOPEN_READ_WRITE',			'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 	'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 			'ab');
define('FOPEN_READ_WRITE_CREATE', 		'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 		'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',	'x+b');


/*
|--------------------------------------------------------------------------
| NOMBRE DE LAS TABLAS (BASE DE DATO)
|--------------------------------------------------------------------------
*/
define('TBL_USERS',                       'users');
define('TBL_CONTENTS',                    'contents');
define('TBL_LIST_COUNTRY',                'list_country');
define('TBL_LIST_STATES',                 'list_states');
define('TBL_GALLERY_CONTENTS',            'gallery_contents');
define('TBL_GALLERY_CONTENTS2',           'gallery_contents2');
define('TBL_GALLERY_PRODUCTS',            'gallery_products');
define('TBL_CATEGORIES',                  'categories');
define('TBL_PRODUCTS',                    'products');

/*
|--------------------------------------------------------------------------
| MENSAJES DE ERROR PARA UPLOAD
|--------------------------------------------------------------------------
*/
define('ERR_UPLOAD_NOTUPLOAD', 'El archivo no ha podido llegar al servidor.');
define('ERR_UPLOAD_MAXSIZE', 'El tamaño del archivo debe ser menor a {size} MB.');
define('ERR_UPLOAD_FILETYPE', 'El tipo de archivo es incompatible.');

/*
|--------------------------------------------------------------------------
| EMAIL FORM CONTACTO
|--------------------------------------------------------------------------
*/
define('EMAIL_CONTACT_SUBJECT', 'Formulario de Contacto');
define('EMAIL_CONTACT_MESSAGE', json_encode(array(
    '<b>Compa&ntilde;&iacute;a:</b> {txtCompany}<br />',
    '<b>Nombre:</b> {txtName}<br />',
    '<b>Direcci&oacute;n:</b> {txtAddress}<br />',
    '<b>Ciudad:</b> {txtCity}<br />',
    '<b>C&oacute;digo Postal:</b> {txtPC}<br />',
    '<b>Pa&iacute;s:</b> {country}<br />',
    '<b>Provincia:</b> {cboState}<br />',
    '<b>E-Mail:</b> {txtEmail}<br />',
    '<b>Telefono:</b> {txtPhoneCode} - {txtPhoneNum}<br />',
    '<b>Fax:</b> {txtFaxCode}-{txtFaxNum}<br />',
    '<b>Tema:</b> {txtTheme}<br />',
    '<b>Mensaje:</b> <br />{txtMessage}'
)));

/*
|--------------------------------------------------------------------------
| EMAIL FORM "TRABAJE CON NOSOTROS"
|--------------------------------------------------------------------------
*/
define('EMAIL_TCN_SUBJECT', 'Bottino - Curriculum Vitae');
define('EMAIL_TNC_MESSAGE', json_encode(array(
    '<b>Nombre y apellido:</b> {txtName}<br />',
    '<b>Telefono:</b> {txtPhoneCode}-{txtPhoneNum}<br />',
    '<b>Email:</b> {txtEmail}<br />',
    '<b>Direccion:</b> {txtAddess}<br />',
    '<b>Fecha de nacimiento:</b> {txtNac}<br />',
    '<b>Sexo:</b> {optSex}<br />',
    '<b>Trabajar o representar:</b> {optTipo}<br />',
    '<b>Zona de interes:</b> {txtZona}<br />',
    '<b>Experiencia:</b><br /> {txtExperiencia}<br />',
    '<b>Programas:</b><br /> {txtPrograms}'
)));

/*
|--------------------------------------------------------------------------
| EMAIL FORM CV
|--------------------------------------------------------------------------
*/
$msg = '
    <b>Nombre:</b> {name}<br />
    <b>E-Mail:</b> {email}<br />
    <b>Comentario:</b> {email}<br />
    {comment}
';
define('EMAIL_CV_SUBJECT', 'Grundfos - Curriculum Vitae');
define('EMAIL_CV_TO', 'iwmattoni@gmail.com');
define('EMAIL_CV_MESSAGE', $msg);

/*
|--------------------------------------------------------------------------
| EMAIL FORM "CONSULTAS"
|--------------------------------------------------------------------------
*/
define('EMAIL_CONSULTS_SUBJECT', 'Formulario de Consulta');
define('EMAIL_CONSULTS_MESSAGE', json_encode(array(
    '<b>Nombre:</b> {txtName}<br />',
    '<b>Asunto:</b> {txtSubject}<br />',
    '<b>Email:</b> {txtEmail}<br />',
    '<b>Consulta:</b> <br />{txtConsult}'
)));

/*
|--------------------------------------------------------------------------
| UPLOAD FILE
|--------------------------------------------------------------------------
*/
define('UPLOAD_FILETYPE', 'gif|jpg|png');
define('UPLOAD_MAXSIZE', 2048); //Expresado en Kylobytes

define('UPLOAD_PATH_PRODUCTS', './uploads/products/');
define('UPLOAD_PATH_SIDEBAR', './uploads/sidebar/');
define('UPLOAD_PATH_SIDEBAR2', './uploads/sidebar2/');
define('UPLOAD_PATH_CV', './uploads/cv/');

define('IMAGESIZE_PRODGALLERY_THUMB_W', 63);
define('IMAGESIZE_PRODGALLERY_THUMB_H', 50);
define('IMAGESIZE_PRODGALLERY_FULL_W', 380);
define('IMAGESIZE_PRODGALLERY_FULL_H', 285);

define('IMAGESIZE_SIDEBAR_THUMB_W', 183);
define('IMAGESIZE_SIDEBAR_THUMB_H', 105);
define('IMAGESIZE_SIDEBAR_FULL_W', 380);
define('IMAGESIZE_SIDEBAR_FULL_H', 285);

define('IMAGESIZE_SIDEBAR2_THUMB_W', 200);
define('IMAGESIZE_SIDEBAR2_THUMB_H', 150);


/*
|--------------------------------------------------------------------------
| TITULOS DE CADA SECCION
|--------------------------------------------------------------------------
*/
define('TITLE_GLOBAL', 'Electromecánica Bottino'); // Titulo para todas las secciones
define('TITLE_INDEX', 'Electromecánica Bottino');
define('TITLE_EMPRESA', 'Electromecánica Bottino - Empresa');
define('TITLE_PRODUCTOS', 'Electromecánica Bottino - Productos');
define('TITLE_ENERGIARENOVABLE', 'Electromecánica Bottino - Energía Renovable');
define('TITLE_SERVICIOS', 'Electromecánica Bottino - Servicios');
define('TITLE_REPRESENTACIONES', 'Electromecánica Bottino - Representaciones');
define('TITLE_OBRAS', 'Electromecánica Bottino - Obras');
define('TITLE_TESTIMONIALES', 'Electromecánica Bottino - Testimoniales');
define('TITLE_SITEMAP', 'Electromecánica Bottino - Mapa del sitio');
define('TITLE_CONTACTO', 'Electromecánica Bottino - Contacto');
define('TITLE_CONSULTS', 'Electromecánica Bottino - Consulta');
define('TITLE_TRABAJECONOSOTROS', 'Electromecánica Bottino - Trabaje con nosotors');



/*
|--------------------------------------------------------------------------
| META - Palabras Claves y Descripcion de la web
|--------------------------------------------------------------------------
*/
define('META_KEYWORDS_GLOBAL', '');
define('META_KEYWORDS_INDEX', '');
define('META_KEYWORDS_EMPRESA', '');
define('META_KEYWORDS_PRODUCTOS', '');
define('META_KEYWORDS_ENERGIARENOVABLE', '');
define('META_KEYWORDS_SERVICIOS', '');
define('META_KEYWORDS_REPRESENTACIONES', '');
define('META_KEYWORDS_OBRAS', '');
define('META_KEYWORDS_TESTIMONIALES', '');
define('META_KEYWORDS_SITEMAP', '');
define('META_KEYWORDS_CONTACTO', '');
define('META_KEYWORDS_CONSULTS', '');
define('META_KEYWORDS_TRABAJECONOSOTROS', '');

define('META_DESCRIPTION_GLOBAL', '');
define('META_DESCRIPTION_INDEX', '');
define('META_DESCRIPTION_EMPRESA', '');
define('META_DESCRIPTION_PRODUCTOS', '');
define('META_DESCRIPTION_ENERGIARENOVABLE', '');
define('META_DESCRIPTION_SERVICIOS', '');
define('META_DESCRIPTION_REPRESENTACIONES', '');
define('META_DESCRIPTION_OBRAS', '');
define('META_DESCRIPTION_TESTIMONIALES', '');
define('META_DESCRIPTION_SITEMAP', '');
define('META_DESCRIPTION_CONTACTO', '');
define('META_DESCRIPTION_CONSULTS', '');
define('META_DESCRIPTION_TRABAJECONOSOTROS', '');

/*
|--------------------------------------------------------------------------
| CONFIGURACION GENERAL
|--------------------------------------------------------------------------
*/
define('CACHE_TIME', 5);
define('LANG', 1);


/* End of file constants.php */
/* Location: ./system/application/config/constants.php */