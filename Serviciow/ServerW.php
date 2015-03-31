<?php

/**
 * ServerW class
 * 
 * Clase Server Tarea 9 Servicios web con SOAP 
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class ServerW extends SoapClient {

  private static $classmap = array(
                                   );

  public function ServerW($wsdl = "serviciow.wsdl.xml", $options = array()) {
    foreach(self::$classmap as $key => $value) {
      if(!isset($options['classmap'][$key])) {
        $options['classmap'][$key] = $value;
      }
    }
    parent::__construct($wsdl, $options);
  }

  /**
   * Devuelve el PVP del producto, a partir de su codigo 
   *
   * @param string $codigo
   * @return float
   */
  public function getPVP($codigo) {
    return $this->__soapCall('getPVP', array($codigo),       array(
            'uri' => 'http://localhost/Serviciow',
            'soapaction' => ''
           )
      );
  }

  /**
   * Devuelve stock a partir del codigo de producto y de la tienda 
   *
   * @param string $codigo
   * @param int $tienda
   * @return int
   */
  public function getStock($codigo, $tienda) {
    return $this->__soapCall('getStock', array($codigo, $tienda),       array(
            'uri' => 'http://localhost/Serviciow',
            'soapaction' => ''
           )
      );
  }

  /**
   * Devuelve array con los codigos de las familias 
   *
   * @param  
   * @return stringArray
   */
  public function getFamilias() {
    return $this->__soapCall('getFamilias', array(),       array(
            'uri' => 'http://localhost/Serviciow',
            'soapaction' => ''
           )
      );
  }

  /**
   * Devuelve array con los productos de una familia a partir de su codigo 
   *
   * @param string $codigo
   * @return stringArray
   */
  public function getProductosFamilia($codigo) {
    return $this->__soapCall('getProductosFamilia', array($codigo),       array(
            'uri' => 'http://localhost/Serviciow',
            'soapaction' => ''
           )
      );
  }

}

?>
