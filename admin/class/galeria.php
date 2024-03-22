
<?php


require_once('conexao.php');

class GaleriaClass
{

    
    public $idGaleria;

    public $nomeGaleria;
  
    public $fotoGaleria;

    public $statusGaleria;
    

public function listarGaleria()
    {
        $sql = "SELECT * FROM tblgaleria WHERE statusGaleria = 'ATIVO' ORDER BY idGaleria ASC ";
        //$sql =  "SELECT * FROM tblgaleria ORDER BY idGaleria ASC" ;
        $conn = Conexao::LigarConexao();
        $resultado = $conn->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function listarDesativados()
    {
        $sql = "SELECT * FROM tblgaleria WHERE statusGaleria = 'DESATIVADO' ORDER BY idGaleria ASC";
        $conn = Conexao::LigarConexao();
        $resultado = $conn->query($sql);
        $listaDesativados = $resultado->fetchAll();
        return $listaDesativados;
    }
    



    public function Cadastrar()
    {
        $query = "INSERT INTO tblgaleria (
            nomeGaleria,
            statusGaleria,
            fotoGaleria
        ) VALUES (
            '{$this->nomeGaleria}',
            '{$this->statusGaleria}',
            '{$this->fotoGaleria}'
        )";
    
        $conn = Conexao::LigarConexao();
        $conn->exec($query);
    
        echo "<script>document.location='index.php?p=galeria'</script>";
    }
public function __construct($id = false)
    {
        if ($id) {
            $this->idGaleria = $id;
            $this->Carregar();
        }
    }

    public function Carregar()
{
    $query = "SELECT * FROM tblgaleria WHERE idGaleria = " . $this->idGaleria;
    $conn = Conexao::LigarConexao();
    $resultado = $conn->query($query);
    $lista = $resultado->fetchAll();

    foreach ($lista as $linha) {
        $this->nomeGaleria = $linha['nomeGaleria'];
        $this->fotoGaleria = $linha['fotoGaleria'];
        $this->statusGaleria = $linha['statusGaleria'];
    }
}


 public function ativar()
 {
     $query = "UPDATE tblgaleria SET statusGaleria ='ATIVO' WHERE idGaleria = " . $this->idGaleria;

     $conn = Conexao::LigarConexao();
     $conn->exec($query);
 }


 public function desativar()
    {
        $query = "UPDATE tblgaleria SET statusGaleria ='DESATIVADO' WHERE idGaleria = " . $this->idGaleria;
        
        $conn = Conexao::LigarConexao();
        $conn->exec($query);
    }
   

}





