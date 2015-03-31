<?php
    
    require_once 'ServerW.Class.php';
    require_once './WSDLDocument-0.6/WSDLDocument.php';//genera el documento WSDL
    
    $url="http://localhost/Serviciow/serviciow.php";
    $uri="http://localhost/Serviciow";
    
    $wsdl=new WSDLDocument('ServerW',$url,$uri);
    
    echo $wsdl->saveXML();
   