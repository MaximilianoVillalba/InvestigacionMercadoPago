<?php 
class archivocargado {
private $idarchivocargado;
private $acnombre;
private $acdescripcion;
private $acicono;
private $objusuario;
private $aclinkacceso;
private $accantidaddescarga;
private $accantidadusada;
private $acfechainiciocompartir;
private $acefechafincompartir;
private $acprotegidoclave;
private $mensajeoperacion;


public function __construct(){
    $this->idarchivocargado="";
    $this->acnombre="";
    $this->acdescripcion="";
    $this->acicono="";
    $this->objusuario="";
    $this->aclinkacceso="";
    $this->accantidaddescarga="";
    $this->accantidadusada="";
    $this->acfechainiciocompartir="";
    $this->acefechafincompartir="";
    $this->acprotegidoclave="";
    $this->mensajeoperacion ="";
}
public function setear($idarchivocargado, $acnombre, 
    $acdescripcion, $acicono, 
    $objusuario, $aclinkacceso, 
    $accantidaddescarga, $accantidadusada, 
    $acfechainiciocompartir, $acefechafincompartir, 
    $acprotegidoclave) {
    $this->setidarchivocargado($idarchivocargado);
    $this->setacnombre($acnombre);
    $this->setacdescripcion($acdescripcion);
    $this->setacicono($acicono);
    $this->setobjusuario($objusuario);
    $this->setaclinkacceso($aclinkacceso);
    $this->setaccantidaddescarga($accantidaddescarga);
    $this->setaccantidadusada($accantidadusada);
    $this->setacfechainiciocompartir($acfechainiciocompartir);
    $this->setacefechafincompartir($acefechafincompartir);
    $this->setacprotegidoclave($acprotegidoclave);
}

public function cargar(){
    $resp = false;
    $base=new BaseDatos();
    $sql="SELECT * FROM archivocargado WHERE idarchivocargado = ".$this->getidarchivocargado();
    if ($base->Iniciar()) {
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                $row = $base->Registro();

                // Carga el objeto que hace referencia a ID de usuario
                $usuario = new usuario;
                $usuario->setidusuario($row['idusuario']);
                $usuario->cargar();

                $this->setear($row['idarchivocargado'], $row['acnombre'], 
                $row['acdescripcion'], $row['acicono'], 
                $usuario, $row['aclinkacceso'], 
                $row['accantidaddescarga'], $row['accantidadusada'], 
                $row['acfechainiciocompartir'], $row['acefechafincompartir'], 
                $row['acprotegidoclave']);
            }
        }
    } else {
        $this->setMensajeoperacion("archivocargado->listar: ".$base->getError());
    }
    return $resp;
}

public function insertar(){
    $resp = false;
    $base=new BaseDatos();
    // Si lleva ID Autoincrement, la consulta SQL no lleva dicho ID
    $sql="INSERT INTO archivocargado(acnombre, acdescripcion, acicono, 
    idusuario, aclinkacceso, accantidaddescarga, accantidadusada, 
    acfechainiciocompartir, acefechafincompartir, acprotegidoclave) VALUES('"
        .$this->getacnombre()."', '".$this->getacdescripcion()."', '"
        .$this->getacicono()."', '".$this->getobjusuario()."', '"
        .$this->getaclinkacceso()."', '".$this->getaccantidaddescarga()."', '"
        .$this->getaccantidadusada()."', '".$this->getacfechainiciocompartir()."', '"
        .$this->getacefechafincompartir()."', '".$this->getacprotegidoclave()."'
    );";
    if ($base->Iniciar()) {
        if ($esteid = $base->Ejecutar($sql)) {
            // Si se usa ID autoincrement, descomentar lo siguiente:
            $this->setidarchivocargado($esteid);
            $resp = true;
        } else {
            $this->setMensajeoperacion("archivocargado->insertar: ".$base->getError());
        }
    } else {
        $this->setMensajeoperacion("archivocargado->insertar: ".$base->getError());
    }
    return $resp;
}

public function modificar(){
    $resp = false;
    $base=new BaseDatos();
    $sql="UPDATE archivocargado 
        SET acnombre='".$this->getacnombre()
        ."', acdescripcion='".$this->getacdescripcion()
        ."', acicono='".$this->getacicono()
        ."', idusuario='".$this->getobjusuario()
        ."', aclinkacceso='".$this->getaclinkacceso()
        ."', accantidaddescarga='".$this->getaccantidaddescarga()
        ."', accantidadusada='".$this->getaccantidadusada()
        ."', acfechainiciocompartir='".$this->getacfechainiciocompartir()
        ."', acfechainiciocompartir='".$this->getacefechafincompartir()
        ."', acefechafincompartir='".$this->getacprotegidoclave()
        ."' WHERE idarchivocargado=".$this->getidarchivocargado();
    if ($base->Iniciar()) {
        if ($base->Ejecutar($sql)) {
            $resp = true;
        } else {
            $this->setMensajeoperacion("archivocargado->modificar: ".$base->getError());
        }
    } else {
        $this->setMensajeoperacion("archivocargado->modificar: ".$base->getError());
    }
    return $resp;
}

public function eliminar(){
    $resp = false;
    $base=new BaseDatos();
    $sql="DELETE FROM archivocargado WHERE idarchivocargado=".$this->getidarchivocargado();
    if ($base->Iniciar()) {
        if ($base->Ejecutar($sql)) {
            return true;
        } else {
            $this->setMensajeoperacion("archivocargado->eliminar: ".$base->getError());
        }
    } else {
        $this->setMensajeoperacion("archivocargado->eliminar: ".$base->getError());
    }
    return $resp;
}

public static function listar($parametro=""){
    $arreglo = array();
    $base=new BaseDatos();
    $sql="SELECT * FROM archivocargado ";
    if ($parametro!="") {
        $sql.='WHERE '.$parametro;
    }
    $res = $base->Ejecutar($sql);
    if($res>-1){
        if($res>0){
            while ($row = $base->Registro()){
                $obj= new archivocargado();

                // Carga el objeto que hace referencia a ID de usuario
                $usuario = new usuario;
                $usuario->setidusuario($row['idusuario']);
                $usuario->cargar();

                $obj->setear($row['idarchivocargado'], $row['acnombre'], 
                $row['acdescripcion'], $row['acicono'], 
                $usuario, $row['aclinkacceso'], 
                $row['accantidaddescarga'], $row['accantidadusada'], 
                $row['acfechainiciocompartir'], $row['acefechafincompartir'], 
                $row['acprotegidoclave']);
                array_push($arreglo, $obj);
            }
        }
    } else {
        $this->setMensajeoperacion("archivocargado->listar: ".$base->getError());
    }

    return $arreglo;
}
    
// -- Métodos get y set --

public function getidarchivocargado() {
    return $this->idarchivocargado;
}
public function setidarchivocargado($idarchivocargado) {
    $this->idarchivocargado = $idarchivocargado;
    return $this;
}

public function getacnombre() {
    return $this->acnombre;
}
public function setacnombre($acnombre) {
    $this->acnombre = $acnombre;
    return $this;
}

public function getacdescripcion() {
    return $this->acdescripcion;
}
public function setacdescripcion($acdescripcion) {
    $this->acdescripcion = $acdescripcion;
    return $this;
}

public function getacicono() {
    return $this->acicono;
}
public function setacicono($acicono) {
    $this->acicono = $acicono;
    return $this;
}

public function getobjusuario() {
    return $this->objusuario;
}
public function setobjusuario($objusuario) {
    $this->objusuario = $objusuario;
    return $this;
}

public function getaclinkacceso() {
    return $this->aclinkacceso;
}
public function setaclinkacceso($aclinkacceso) {
    $this->aclinkacceso = $aclinkacceso;
    return $this;
}

public function getaccantidaddescarga() {
    return $this->accantidaddescarga;
}
public function setaccantidaddescarga($accantidaddescarga) {
    $this->accantidaddescarga = $accantidaddescarga;
    return $this;
}

public function getaccantidadusada() {
    return $this->accantidadusada;
}
public function setaccantidadusada($accantidadusada) {
    $this->accantidadusada = $accantidadusada;
    return $this;
}

public function getacfechainiciocompartir() {
    return $this->acfechainiciocompartir;
}
public function setacfechainiciocompartir($acfechainiciocompartir) {
    $this->acfechainiciocompartir = $acfechainiciocompartir;
    return $this;
}

public function getacefechafincompartir() {
    return $this->acefechafincompartir;
}
public function setacefechafincompartir($acefechafincompartir) {
    $this->acefechafincompartir = $acefechafincompartir;
    return $this;
}

public function getacprotegidoclave() {
    return $this->acprotegidoclave;
}
public function setacprotegidoclave($acprotegidoclave) {
    $this->acprotegidoclave = $acprotegidoclave;
    return $this;
}

public function getMensajeoperacion() {
    return $this->mensajeoperacion;
}
public function setMensajeoperacion($mensajeoperacion) {
    $this->mensajeoperacion = $mensajeoperacion;
    return $this;
}
} // Fin clase archivocargado


?>