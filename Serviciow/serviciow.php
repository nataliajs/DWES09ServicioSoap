<?php
    require_once('ServerW.Class.php');       
    $service= new SoapServer('serviciow.wsdl.xml', array('uri'=>'http://localhost/Serviciow'));    
    //añado la clase
    $service->setClass('ServerW');
    $service->handle();