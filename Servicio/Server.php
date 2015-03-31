<?php
    require_once('DB.php');
    require_once('Producto.php');
    
    class Server{
        //parámetro: codigo del producto;devuelve el PVP
        public function getPVP($codigo){
            $producto=DB::getProducto($codigo);
            return $producto->getPvp();
        }
        //parametros: codigo de producto y tienda; devuelve stock
        public function getStock($codigo,$tienda){
            $stock=DB::getStock($codigo,$tienda);
            return $stock;
        }
        //devuelve array con los codigos de las familias
        public function getFamilias(){
            $familias=DB::getFamilias();
            return $familias;
        }
        //parametro: codigo de una familia; devuelve array con los productos de esa familia
        public function getProductosFamilia($codigo){
            $productos=DB::getProductosFamilias($codigo);
            return $productos;
        }
    }
    
