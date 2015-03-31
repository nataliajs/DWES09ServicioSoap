<?php
    require_once('Server.php');    
    $uri="localhost/Servicio";
    $service= new SoapServer(null,array('uri'=>$uri));    
    //añado la clase
    $service->setClass('Server');
    $service->handle();
