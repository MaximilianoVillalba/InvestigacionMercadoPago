<?php 
class archivocargadoestado {
private $idarchivocargadoestado;
private $objestadotipos;
private $acedescripcion;
private $objusuario;
private $acefechaingreso;
private $acefechafin;
private $objarchivocargado;
private $mensajeoperacion;


public function __construct(){
    $this->idarchivocargadoestado="";
    $this->objestadotipos="";
    $this->acedescripcion="";
    $this->objusuario="";
    $this->acefechaingreso=date('Y-m-d H:i:s');
    $this->acefechafin="";
    $this->objarchivocargado="";
    $this->mensajeoperacion ="";
}
public function setear($idarchivocargadoestado, $objestadotipos, $acedescripcion, $objusuario, 
    $acefechaingreso, $acefechafin, $objarchivocargado) {
    $this->setidarchivocargadoestado($idarchivocargadoestado);
    $this->setobjestadotipos($objestadotipos);
    $this->setacedescripcion($acedescripcion);
    $this->setobjusuario($objusuario);
    $this->setacefechaingreso($acefechaingreso);
    $this->setacefechafin($acefechafin);
    $this->setobjarchivocargado($objarchivocargado);
}

public function cargar(){
    $resp = false;
    $base=new BaseDatos();
    $sql="SELECT * FROM archivocargadoestado WHERE idarchivocargadoestado = ".$this->getidarchivocargadoestado();
    if ($base->Iniciar()) {
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                $row = $base->Registro();
                // Carga los objetos que hacen referencia a sus ID
                $usuario = new usuario;
                $usuario->setidusuario($row['idusuario']);
                $usuario->cargar();

                $estadotipos = new estadotipos;
                $estadotipos->setidestadotipos($row['idestadotipos']);
                $estadotipos->cargar();
                
                $archivocargado = new archivocargado;
                $archivocargado->setidarchivocargado($row['idarchivocargado']);
                $archivocargado->cargar();

                $this->setear($row['idarchivocargadoestado'], $estadotipos, 
                $row['acedescripcion'], $usuario, 
                $row['acefechaingreso'], $row['acefechafin'], 
                $archivocargado);
            }
        }
    } else {
        $this->setMensajeoperacion("archivocargadoestado->listar: ".$base->getError());
    }
    return $resp;
}

public function insertar(){
    $resp = false;
    $base=new BaseDatos();
    // Si lleva ID Autoincrement, la consulta SQL no lleva dicho ID
    $sql="INSERT INTO archivocargadoestado(idestadotipos, acedescripcion, idusuario, 
        acefechaingreso, acefechafin, idarchivocargado) VALUES('"
        .$this->getobjestadotipos()."', '".$this->getacedescripcion()."', '"
        .$this->getobjusuario()."', '".$this->getacefechaingreso()."', '"
        .$this->getacefechafin()."', '".$this->getobjarchivocargado()."');";
    if ($base->Iniciar()) {
        if ($esteid = $base->Ejecutar($sql)) {
            // Si se usa ID autoincrement, descomentar lo siguiente:
            $this->setidarchivocargadoestado($esteid);
            $resp = true;
        } else {
            $this->setMensajeoperacion("archivocargadoestado->insertar: ".$base->getError());
        }
    } else {
        $this->setMensajeoperacion("archivocargadoestado->insertar: ".$base->getError());
    }
    return $resp;
}

public function modificar(){
    $resp = false;
    $base=new BaseDatos();
    $sql="UPDATE archivocargadoestado 
    SET idestadotipos='".$this->getobjestadotipos()
    ."', acedescripcion='".$this->getacedescripcion()
    ."', acicono='".$this->getacicono()
    ."', idusuario='".$this->getobjusuario()
    ."', acefechaingreso='".$this->getacefechaingreso()
    ."', acefechafin='".$this->getacefechafin()
    ."', idarchivocargado='".$this->getobjarchivocargado()
    ."' WHERE idarchivocargadoestado=".$this->getidarchivocargadoestado();
    if ($base->Iniciar()) {
        if ($base->Ejecutar($sql)) {
            $resp = true;
        } else {
            $this->setMensajeoperacion("archivocargadoestado->modificar: ".$base->getError());
        }
    } else {
        $this->setMensajeoperacion("archivocargadoestado->modificar: ".$base->getError());
    }
    return $resp;
}

public function eliminar(){
    $resp = false;
    $base=new BaseDatos();
    $sql="DELETE FROM archivocargadoestado WHERE idarchivocargadoestado=".$this->getidarchivocargadoestado();
    if ($base->Iniciar()) {
        if ($base->Ejecutar($sql)) {
            return true;
        } else {
            $this->setMensajeoperacion("archivocargadoestado->eliminar: ".$base->getError());
        }
    } else {
        $this->setMensajeoperacion("archivocargadoestado->eliminar: ".$base->getError());
    }
    return $resp;
}

public static function listar($parametro=""){
    $arreglo = array();
    $base=new BaseDatos();
    $sql="SELECT * FROM archivocargadoestado ";
    if ($parametro!="") {
        $sql.='WHERE '.$parametro;
    }
    $res = $base->Ejecutar($sql);
    if($res>-1){
        if($res>0){
            while ($row = $base->Registro()){
                $obj= new archivocargadoestado();

                // Carga los objetos que hacen referencia a sus ID
                $usuario = new usuario;
                $usuario->setidusuario($row['idusuario']);
                $usuario->cargar();

                $estadotipos = new estadotipos;
                $estadotipos->setidestadotipos($row['idestadotipos']);
                $estadotipos->cargar();
                
                $archivocargado = new archivocargado;
                $archivocargado->setidarchivocargado($row['idarchivocargado']);
                $archivocargado->cargar();

                $obj->setear($row['idarchivocargadoestado'], $estadotipos, 
                $row['acedescripcion'], $row['acicono'], 
                $usuario, $row['acefechaingreso'], 
                $row['acefechafin'], $archivocargado);
                array_push($arreglo, $obj);
            }
        }
    } else {
        $this->setMensajeoperacion("archivocargadoestado->listar: ".$base->getError());
    }

    return $arreglo;
}
    
// -- Métodos get y set --

public function getidarchivocargadoestado() {
    return $this->idarchivocargadoestado;
}
public function setidarchivocargadoestado($idarchivocargadoestado) {
    $this->idarchivocargadoestado = $idarchivocargadoestado;
    return $this;
}

public function getobjestadotipos() {
    return $this->objestadotipos;
}
public function setobjestadotipos($objestadotipos) {
    $this->objestadotipos = $objestadotipos;
    return $this;
}

public function getacedescripcion() {
    return $this->acedescripcion;
}
public function setacedescripcion($acedescripcion) {
    $this->acedescripcion = $acedescripcion;
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

public function getacefechaingreso() {
    return $this->acefechaingreso;
}
public function setacefechaingreso($acefechaingreso) {
    $this->acefechaingreso = $acefechaingreso;
    return $this;
}

public function getacefechafin() {
    return $this->acefechafin;
}
public function setacefechafin($acefechafin) {
    $this->acefechafin = $acefechafin;
    return $this;
}

public function getobjarchivocargado() {
    return $this->objarchivocargado;
}
public function setobjarchivocargado($objarchivocargado) {
    $this->objarchivocargado = $objarchivocargado;
    return $this;
}

public function getMensajeoperacion() {
    return $this->mensajeoperacion;
}
public function setMensajeoperacion($mensajeoperacion) {
    $this->mensajeoperacion = $mensajeoperacion;
    return $this;
}
} // Fin clase archivocargadoestado


?>