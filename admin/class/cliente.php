<?php

require_once ('conexao.php');

class ClienteClass
{

    public $idUsuario;
    public $nomeUsuario;
    public $emailUsuario;

    public $senhaUsuario;

    public $fotoUsuario;

    public $statusUsuario;

    public $tipoUsuario;

   public function ListarCliente()
   {
    $sql = "SELECT * FROM tblusuarios WHERE statusUsuario = 'ATIVO' ORDER BY idUsuario ASC";
    $conn = Conexao::LigarConexao();
    $resultado = $conn->query($sql);
    $lista = $resultado->fetchAll();

    if (!empty($lista)) {
        $_SESSION['nomeUsuario'] = $lista[0]['nomeUsuario'];
    }

    return $lista;

  }

  public function ListarClienteDesativados()
  {
   $sql = "SELECT * FROM tblusuarios WHERE statusUsuario = 'DESATIVADO' ORDER BY idUsuario ASC";
   $conn = Conexao::LigarConexao();
   $resultado = $conn->query($sql);
   $lista = $resultado->fetchAll();
   return $lista;

 }
  public function Cadastrar()
{
    $query = "INSERT INTO tblusuarios (
        nomeUsuario, 
        emailUsuario, 
        senhaUsuario, 
        fotoUsuario,
        statusUsuario 
       
    ) VALUES (
        '{$this->nomeUsuario}',
        '{$this->emailUsuario}',
        '{$this->senhaUsuario}',
        '{$this->fotoUsuario}',
        '{$this->statusUsuario}'
       
    )";

    $conn = Conexao::LigarConexao();
    $conn->exec($query);

    echo "<script>document.location='index.php?p=clientes'</script>";
}
public function __construct($id = false)
    {
        if ($id) {
            $this->idUsuario = $id;
            $this->Carregar();
        }
    }

    public function Carregar()
    {
        $query = "SELECT * FROM tblusuarios WHERE idUsuario = " . $this->idUsuario;
        $conn = Conexao::LigarConexao();
        $resultado = $conn->query($query);
        $lista = $resultado->fetchAll();

        foreach ($lista as $linha) {
            $this->nomeUsuario = $linha['nomeUsuario'];
            $this->emailUsuario = $linha['emailUsuario'];
            $this->senhaUsuario = $linha['senhaUsuario'];
            $this->statusUsuario = $linha['statusUsuario'];
            $this->fotoUsuario = $linha['fotoUsuario'];
        }
        }
    
    public function Atualizar()
    {
        $query = "UPDATE tblusuarios 
     SET  nomeUsuario = '" . $this->nomeUsuario . "',
         emailUsuario = '" . $this->emailUsuario . "',
         senhaUsuario = '" . $this->senhaUsuario . "',
         statusUsuario = '" . $this->statusUsuario . "',
        fotoUsuario = '". $this->fotoUsuario ."'
         WHERE tblusuarios.idUsuario = '" . $this->idUsuario . "'";

        $conn = Conexao::LigarConexao();
        $conn->exec($query);
        echo "<script>document.location='index.php?p=clientes'</script>";

}
public function desativar()
    {
        $query = "UPDATE tblusuarios SET statusUsuario ='DESATIVADO' WHERE idUsuario = " . $this->idUsuario;
        
        $conn = Conexao::LigarConexao();
        $conn->exec($query);
    }
 
    public function ativar()
  {
      $query = "UPDATE tblusuarios SET statusUsuario ='ATIVO' WHERE idUsuario = " . $this->idUsuario;

      $conn = Conexao::LigarConexao();
      $conn->exec($query);
  }

  public function getNome()
  {
      return $this->nomeUsuario;
  }

  public function getFoto()
  {
      return $this->fotoUsuario;
  }

  public function getTipo() {
    return $this->tipoUsuario;
}



  public function verificarLogin()
  {
 
    
 
      $sql = "SELECT * FROM tblusuarios 
         WHERE emailUsuario = '". $this->emailUsuario ."' AND    
         senhaUsuario = '". $this->senhaUsuario ."'";
      $conn = Conexao::LigarConexao();
      $resultado = $conn->query($sql);
      $usuario = $resultado->fetch();
  
      if ($usuario) {
          return $usuario['idUsuario'];
      } else {
          return false;
      }
  }
  
 
 }
 
 if (isset($_POST['email'])) {
 
     $usuario = new ClienteClass();
 
     $emailLogin = $_POST['email'];
     $senhaLogin = $_POST['senha'];
 
     $usuario->emailUsuario = $emailLogin;
     $usuario->senhaUsuario = $senhaLogin;
 
     if($idUsuario = $usuario->verificarLogin()){
         //Login bem-sucedido
       //print_r($idUsuario);
 
         session_start();
         $_SESSION['idUsuario'] = $idUsuario;
         echo json_encode(['success' => true, 'message' => 'Login foi realizado com sucesso', 'idUsuario' => $idUsuario]);
 
     }else{
         //Login inválido
        //print_r('Erro de login');
 
         echo json_encode(['success' => false, 'message' => 'Email ou Senha inválido']);
     }
 
   //print_r($_POST['email']);
 }
 
 



