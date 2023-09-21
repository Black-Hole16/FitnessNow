   <?php  

class MySQL {
    private $conexion;
    private $total_consultas = 0;

 public function __construct() {
      
        $this->conexion = mysqli_connect('localhost', 'root', '', 'luis');

        if (!$this->conexion) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

 public function consulta($consulta) {
        $this->total_consultas++;
        $resultado = mysqli_query($this->conexion, $consulta);

        if (!$resultado) {
            echo 'MySQL Error: ' . mysqli_error($this->conexion);
            exit;
        }

        return $resultado;
    }

 public function num_rows($consulta) {
        return mysqli_num_rows($consulta);
    }

    public function fetch_array($consulta){
        return mysqli_fetch_array($consulta);
    }

 public function getTotalConsultas() {
        return $this->total_consultas;
    }

 public function inserta($sqlinsertar) {
        $this->total_consultas++;
        $resultado = mysqli_query($this->conexion, $sqlinsertar);

        if (!$resultado) {
            echo 'MySQL Error: ' . mysqli_error($this->conexion);
            exit;
        }

        return $resultado;
    }

 public function elimina($sqlelimina) {
        $this->total_consultas++;
        $resultado = mysqli_query($this->conexion, $sqlelimina);

        if (!$resultado) {
            echo 'MySQL Error: ' . mysqli_error($this->conexion);
            exit;
        }

        return $resultado;
    }

 public function modifica($sqlmodifica) {
        $this->total_consultas++;
        $resultado = mysqli_query($this->conexion, $sqlmodifica);

        if (!$resultado) {
            echo 'MySQL Error: ' . mysqli_error($this->conexion);
            exit;
        }

        return $resultado;
    }
    // metodo destructor
 public function __destruct() {
        if ($this->conexion) {
            mysqli_close($this->conexion);
        }
    }
}
?>