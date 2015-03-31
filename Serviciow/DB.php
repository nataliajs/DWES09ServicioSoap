<?php
/**
 * Description of DB
 *
 * @author natalia
 */

class DB {
    public function getProducto($codigo){
       $consult="SELECT PVP,nombre_corto,familia FROM producto WHERE cod=?";
       $conexion=self::conectarDb();
       if($conexion==null){
            echo "Error conectando con la bases de datos";
        }else{
            $consulta=$conexion->stmt_init();
            $consulta->prepare($consult);
            $consulta->bind_param('s',$codigo);
            $consulta->execute();
            $consulta->bind_result($pvp,$nom,$fam);
            if($consulta->fetch()){                
                $respuesta= new Producto($pvp, $codigo, $nom, $fam);
            }else{
                $respuesta="El dato no se encuentra en la base de datos";
            }            
            return $respuesta;
        }
    }
    
    public function getStock($codigo,$tienda){
       $consult="SELECT unidades FROM stock WHERE producto=? AND tienda=?";
       $conexion=self::conectarDb();
       if($conexion==null){
            echo "Error conectando con la bases de datos";
        }else{
            $consulta=$conexion->stmt_init();
            $consulta->prepare($consult);
            $consulta->bind_param('si',$codigo,$tienda);
            $consulta->execute();
            $consulta->bind_result($data);
            if($consulta->fetch()){
                $respuesta= $data;
            }else{
                $respuesta="El dato no se encuentra en la base de datos";
            }                                   
            return $respuesta;
            $consulta->free();
            $conexion->close();
        }
    }
    
    public function getFamilias() {
       $consult="SELECT cod FROM familia";
       $conexion=self::conectarDb();
       if($conexion==null){
            echo "Error conectando con la bases de datos";
        }else{
            $consulta=$conexion->query($consult);
            if($consulta){                
                $count=0;                
                $respuesta=array();
                while($row=$consulta->fetch_array()){
                    $respuesta[$count]=$row[0];
                    $count++;
                }
            }else{
                $respuesta="El dato no se encuentra en la base de datos";
            }                                   
            return $respuesta;
            $consulta->free();
            $conexion->close();
        }
    }
    
    public function getProductosFamilias($codigo){
       $consult="SELECT cod FROM producto WHERE familia=?";
       $conexion=self::conectarDb();
       if($conexion==null){
            echo "Error conectando con la bases de datos";
        }else{
            $consulta=$conexion->stmt_init();
            $consulta->prepare($consult);
            $consulta->bind_param('s',$codigo);
            $consulta->execute();
            $consulta->bind_result($data);
            $respuesta=array();
            $n=0;
            while($consulta->fetch()){
                $respuesta[$n]=$data;
                $n++;                
            }           
            return $respuesta;
        }        
    }
    
    public function conectarDb(){
        $host='localhost';
        $usuario='dwes';
        $pass='abc123';
        $db='tarea6';
        $conexion = new mysqli($host,$usuario,$pass,$db);  
        return $conexion;
    }
}
