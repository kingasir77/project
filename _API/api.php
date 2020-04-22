
<?php


require_once 'restler.php';

use Luracast\Restler\Restler;

$r = new Restler();
$r->setSupportedFormats('jsonformat');
$r->addAPIClass('company');

$r->addAPIClass('office');
$r->addAPIClass('plan');
$r->addAPIClass('specialty');
$r->addAPIClass('hospital');


$r->handle();   


?>