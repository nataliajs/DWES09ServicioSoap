<?php
/**
 * Description of producto
 *
 * @author natalia
 */
class Producto {
    private $pvp;
    private $codigo;
    private $nombre;
    private $familia;
    
    function __construct($pvp,$codigo,$nombre,$familia) {
        $this->pvp=$pvp;
        $this->codigo=$codigo;
        $this->nombre=$nombre;
        $this->familia=$familia;      
    }
    
    public function getPvp(){
        return $this->pvp;
    }
    public function setPvp($pvp){
        $this->pvp=$pvp;
    }
    public function getCodigo(){
        return $this->codigo;
    }
    public function setCodigo($codigo){
        $this->codigo=$codigo;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function getFamilia(){
        return $this->familia;
    }
    public function setFamilia($familia){
        $this->familia=$familia;
    }
}
