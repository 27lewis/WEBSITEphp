
<?php
abstract class Recurso{
  public $codigo, $nombre, $estado;
 /* lewis escorcia*/
  public function __construct($codigo, $nombre, $estado){
    $this->codigo = $codigo;
    $this->nombre = $nombre;
    $this->estado = $estado;
  }

  public function __tostring(){
    $salida =
    "Codigo: " . $this->codigo . 
    "<br>Nombre: ". $this->nombre .
    "<br>Estado: " . $this->estado;
    return $salida;
  }

  public abstract function diasPrestamo();

}

class Libro extends Recurso{
  public $autor, $editorial, $year, $isbn, $categoria;

  public function __construct($codigo, $nombre, $estado, $autor, $editorial, $year, $isbn, $categoria){
    parent::__construct($codigo, $nombre, $estado);
    $this->autor = $autor;
    $this->editorial = $editorial;
    $this->year = $year;
    $this->isbn = $isbn;
    $this->categoria = $categoria;
}


  public function __tostring(){
    $salida = parent::__tostring();
    $salida .= "<br>Autor: " . $this->autor .
    "<br>Editorial: ". $this->editorial .
    "<br>Año: " . $this->year .
    "<br>ISBN: " . $this->isbn .
    "<br>Categoria: " . $this->categoria;

    return $salida;
  }

  public function diasPrestamo(){
    if($this->categoria == "General"){
      return 3;
    }else{
      return 1;
    }
  }
}

class Revista extends Recurso{
  public $numero_volumen, $fecha_publicacion, $periocidad, $issn;
  public function __construct($codigo, $nombre, $estado, $numero_volumen, $fecha_publicacion, $periocidad, $issn){
    parent::__construct($codigo, $nombre, $estado);
    $this->numero_volumen = $numero_volumen;    
    $this->fecha_publicacion = $fecha_publicacion;
    $this->periocidad = $periocidad;
    $this->issn = $issn;
  }

  public function __tostring(){
    $salida = parent::__tostring();
    $salida .= "<br>Numero de volumen: " . $this->numero_volumen .
    "<br>Fecha de publicacion: " . $this->fecha_publicacion .
    "<br>Periocidad : " . $this->periocidad .
    "<br>ISSN: " . $this->issn;
    return $salida;
  }

  public function diasPrestamo(){
    return 4;
  }

}

class VideoEducativos extends Recurso{
  public $formato, $duracion, $year_creacion;
  public function __construct($codigo, $nombre, $estado, $formato, $duracion, $year_creacion){
    parent::__construct($codigo, $nombre, $estado);
    $this->formato = $formato;
    $this->duracion = $duracion;
    $this->year_creacion = $year_creacion;
  }

  public function __tostring(){
    $salida = parent::__tostring();
    $salida .= "<br>Formato: " . $this->formato .
    "<br>Duracion: " . $this->duracion .
    "<br>Año de creacion: " . $this->year_creacion;
    return $salida;
  }
  public function diasPrestamo(){
    if($this->year_creacion < 2015){
      return 5;
    }else{
      return 2;
    }
  }
}

?>