<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="bootstrap-3.3.4-dist/css/bootstrap.css"/>
    </head>
    <body>
        <?php
            
            require_once '/var/www/html/Serviciow/ServerW.php';

            $cliente=new ServerW("http://localhost/Serviciow/serviciow.php?wsdl");
            
            if(isset($_POST['submit'])){
                $codigo=$_POST['codigo'];
                if(strlen($codigo)>2){
                $precio=$cliente->getPVP($codigo);
                }
                
                $codigoStock=$_POST['codigoStock'];
                $tiendaStock=$_POST['tiendaStock'];
                if(strlen($codigoStock)>2&&strlen($tiendaStock)==1){
                $stock=$cliente->getStock($codigoStock,$tiendaStock);
                }
                                
                $familias=$cliente->getFamilias();

                $fam=$familias[0];
                for($n=1;$n<count($familias);$n++){
                    $fam.=", ";
                    $fam.=$familias[$n]."  ";
                }                
                
                $productoFamilia=$_POST['productoFamilia'];
                if(strlen($productoFamilia)>1){
                $productosFamilia=$cliente->getProductosFamilia($productoFamilia);
                $productos=$productosFamilia[0];
                for($n=1;$n<count($productosFamilia);$n++){                   
                    $productos.=", ";
                    $productos.=$productosFamilia[$n];                    
                }
                }
            }

        ?>
        <div class="container">
            <div class="jumbotron">
                <h2>Cliente Soap</h2>
            </div>
        <div class="col-xs-4">
        <form action="" method="POST" role="form">
            <fieldset>
              <legend>Producto</legend>
              <label>Codigo </label><input type="text" name="codigo" class="form-control"/><br>
              <label>Precio<?php echo " del producto ".$codigo;?></label><br><?php echo $precio." €";?>                  
            </fieldset><br>
            <fieldset>
                <legend>Stock</legend>
                <label>Codigo </label><input type="text" name="codigoStock" class="form-control"/><br>
                <label>Tienda </label><input type="text" name="tiendaStock" class="form-control"/><br>
                <label>Stock del producto<?php echo " ".$codigoStock;?></label><br><?php echo $stock;?> 
            </fieldset><br>
            <fieldset>
                <legend>Familias</legend>
                <?php echo $fam;?>
            </fieldset><br>
            <fieldset>
                <legend>Productos de una familia</legend>
                <label>Familia </label><input type="text" name="productoFamilia" class="form-control"/><br>
                <label>Productos de la familia<?php echo " ".$productoFamilia;?></label><br><?php echo $productos;?><br>
            </fieldset><br>   
            <input type="submit" name="submit" value="Mostrar datos" class="btn btn-info"><br><br><br>
        </form>
        </div>
        </div>
    </body>
</html>
