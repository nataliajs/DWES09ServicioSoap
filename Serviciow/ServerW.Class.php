<?php
    require_once('DB.php');
    require_once('Producto.php');
    /**
     * Clase Server
     * Tarea 9 Servicios web con SOAP
     * 
     * @author Natalia
     */
    class ServerW{
        /**
         *Devuelve el PVP del producto, a partir de su codigo
         * 
         * @param string $codigo
         * @return float 
         */
        public function getPVP($codigo){
            $producto=DB::getProducto($codigo);
            return $producto->getPvp();
        }
        /**
         * Devuelve stock a partir del codigo de producto y de la tienda
         * 
         * @param string $codigo
         * @param int $tienda
         * @return int $stock
         */        
        public function getStock($codigo,$tienda){
            $stock=DB::getStock($codigo,$tienda);
            return $stock;
        }
        /**
         * Devuelve array con los codigos de las familias
         * 
         * @return string[]
         */        
        public function getFamilias(){
            $familias=DB::getFamilias();
            return $familias;
        }
        /**
         * Devuelve array con los productos de una familia a partir de su codigo
         *  
         * @param string $codigo
         * @return string[]
         */
        public function getProductosFamilia($codigo){
            $productos=DB::getProductosFamilias($codigo);
            return $productos;
        }
    }
    
