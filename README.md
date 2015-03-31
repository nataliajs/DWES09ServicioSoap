# DWES09ServicioSoap
1ª Parte	Servicio SOAP sin WSDL

Esta parte se encuentra en el proyecto Servicio
En primer lugar he creado la base de datos y a continuación la clase DB que realiza la conexión y las consultas sql. Tiene los métodos que se piden en el enunciado. 
La clase Producto tiene los atributos y getters/setters del objeto producto (pvp, codigo, nombre y familia).
La clase Server establece los métodos que se van a poner a disposición del servicio web. Estos métodos llaman a los métodos de la clase DB y, en el caso getPVP, crea un objeto de tipo producto.
En el file servicio.php creo un SoapServer sin WSDL y le 'añado' la clase Server.
Para probar este servicio he creado el proyecto clienteSoap en el que se establece un cliente Soap que llamará a los métodos de la clase Server a través del servicio establecido en servicio.php.

2ª Parte	Servicio SOAP con WSDL

He realizado una copia del proyecto anterior en Serviciow.
He comentado la clase ServerW (en el documento ServerW.Class.php) para generar el WSDL con la herramienta WSDLDocument. He incluído en el proyecto la librería y he generado el documento WSDL a través de genera.php. Tras ejecutar este fichero, he copiado la salida por pantalla en el documento servicio.wsdl.xml.
A continuación publico este documento en el servicio.

Utilizo este documento para crear una nueva clase (ServerW) con la herramienta wsdl2php. Esta clase hereda de SoapClient y contiene los métodos requeridos, descritos en el documento wsdl.
Por último, para comprobar este servicio web he creado un cliente dentro del mismo proyecto (clientewsdl2php.php), para probar el servicio dentro de la misma aplicación y otro externo en el proyecto clientewsdl2php.

