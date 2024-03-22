<?php
require_once('conexao.php');

class FuncionarioClass
{
    public $idFuncionario;
    public $nomeFuncionario;
    public $cargoFuncionario;
    public $dataNascFuncionario;

    public $senhaFuncionario;

    public $emailFuncionario;

    public $nivelFuncionario;

    public $dataAdmissaoFuncionario;

    public $enderecoFuncionario;

    public $telFuncionario;

    public $cepFuncionario;

    public $statusFuncionario;

    public $fotoFuncionario;

    public $linkFaceFuncionario;

    public $linkInstaFuncionario;

    public $linkWhatsFuncionario;



   

    public function listarAtivos()
    {
        $sql = "SELECT * FROM tblfuncionarios WHERE statusFuncionario = 'ATIVO' ORDER BY idFuncionario ASC";
        $conn = Conexao::LigarConexao();
        $resultado = $conn->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function listarDesativados()
    {
        $sql = "SELECT * FROM tblfuncionarios WHERE statusFuncionario = 'DESATIVADO' ORDER BY idFuncionario ASC";
        $conn = Conexao::LigarConexao();
        $resultado = $conn->query($sql);
        $listaDesativados = $resultado->fetchAll();
        return $listaDesativados;
    }
    
    



    public function Cadastrar()
    {
        $query = "INSERT INTO tblfuncionarios (
        nomeFuncionario, 
        cargoFuncionario, 
        dataNascFuncionario, 
        emailFuncionario,
        senhaFuncionario, 
        nivelFuncionario, 
        dataAdmissaoFuncionario, 
        enderecoFuncionario, 
        telFuncionario, 
        cepFuncionario, 
        statusFuncionario, 
        fotoFuncionario
    ) VALUES (
        '" . $this->nomeFuncionario . "',
        '" . $this->cargoFuncionario . "',
        '" . $this->dataNascFuncionario . "',
        '" . $this->emailFuncionario . "',
        '" . $this->senhaFuncionario . "',
        '" . $this->nivelFuncionario . "',
        '" . $this->dataAdmissaoFuncionario . "',
        '" . $this->enderecoFuncionario . "',
        '" . $this->telFuncionario . "',
        '" . $this->cepFuncionario . "',
        '" . $this->statusFuncionario . "',
        '" . $this->fotoFuncionario . "'
    )";

        $conn = Conexao::LigarConexao();
        $conn->exec($query);

        echo "<script>document.location='index.php?p=funcionarios'</script>";
    }

    public function __construct($id = false)
    {

        if ($id) {
            $this->idFuncionario = $id;
            $this->Carregar();
        }
    }

    // Carregar 
    public function Carregar()
    {
        $query = "SELECT * FROM  tblfuncionarios WHERE idFuncionario = " . $this->idFuncionario;
        $conn = Conexao::LigarConexao();
        $resultado = $conn->query($query);
        $lista = $resultado->fetchAll();

        foreach ($lista as $linha) {
            $this->nomeFuncionario = $linha['nomeFuncionario'];
            $this->cargoFuncionario = $linha['cargoFuncionario'];
            $this->dataNascFuncionario = $linha['dataNascFuncionario'];
            $this->emailFuncionario = $linha['emailFuncionario'];
            $this->senhaFuncionario = $linha['senhaFuncionario'];
            $this->nivelFuncionario = $linha['nivelFuncionario'];
            $this->dataAdmissaoFuncionario = $linha['dataAdmissaoFuncionario'];
            $this->enderecoFuncionario = $linha['enderecoFuncionario'];
            $this->telFuncionario = $linha['telFuncionario'];
            $this->cepFuncionario = $linha['cepFuncionario'];
            $this->statusFuncionario = $linha['statusFuncionario'];
            $this->fotoFuncionario = $linha['fotoFuncionario'];
            $this->linkFaceFuncionario = $linha['linkFaceFuncionario'];
            $this->linkInstaFuncionario = $linha['linkInstaFuncionario'];
            $this->linkWhatsFuncionario = $linha['linkWhatsFuncionario'];

        }
    }






    public function Atualizar()
    {

        $query = "UPDATE tblfuncionarios  
          SET nomeFuncionario =  '" . $this->nomeFuncionario . "', 
              cargoFuncionario =  '" . $this->cargoFuncionario . "',
              dataNascFuncionario = '" . $this->dataNascFuncionario . "', 
              emailFuncionario = '" . $this->emailFuncionario . "',
              senhaFuncionario = '" . $this->senhaFuncionario . "',
              nivelFuncionario = '" . $this->nivelFuncionario . "',
              dataAdmissaoFuncionario = '" . $this->dataAdmissaoFuncionario . "',
              enderecoFuncionario = '" . $this->enderecoFuncionario . "',
              telFuncionario = '" . $this->telFuncionario . "',
              cepFuncionario = '" . $this->cepFuncionario . "',
              statusFuncionario = '" . $this->statusFuncionario . "',
              fotoFuncionario = '" . $this->fotoFuncionario . "'
              WHERE tblfuncionarios.idFuncionario = '" . $this->idFuncionario . "'";

        $conn = Conexao::LigarConexao();
        $conn->exec($query);
        echo "<script>document.location='index.php?p=funcionarios'</script>";
    }

    public function desativar()
    {
        $query = "UPDATE tblfuncionarios SET statusFuncionario ='DESATIVADO' WHERE idFuncionario = " . $this->idFuncionario;

        $conn = Conexao::LigarConexao();
        $conn->exec($query);
    }

    public function ativar()
    {
        $query = "UPDATE tblfuncionarios SET statusFuncionario ='ATIVO' WHERE idFuncionario = " . $this->idFuncionario;

        $conn = Conexao::LigarConexao();
        $conn->exec($query);
    }
    public function verificarLogin()
    {
   
      
   
        $sql = "SELECT * FROM tblfuncionarios 
           WHERE emailFuncionario = '". $this->emailFuncionario ."' AND    
           senhaFuncionario = '". $this->senhaFuncionario ."'";
        $conn = Conexao::LigarConexao();
        $resultado = $conn->query($sql);
        $funcionario = $resultado->fetch();
    
        if ($funcionario) {
            return $funcionario['idFuncionario'];
        } else {
            return false;
        }
    }
    
   
   }
   
   if (isset($_POST['email'])) {
   
       $funcionario = new FuncionarioClass();
   
       $emailLogin = $_POST['email'];
       $senhaLogin = $_POST['senha'];
   
       $funcionario->emailFuncionario = $emailLogin;
       $funcionario->senhaFuncionario = $senhaLogin;
   
       if($idFuncionario = $funcionario->verificarLogin()){
           //Login bem-sucedido
         //print_r($idFuncionario);
   
           session_start();
           $_SESSION['idFuncionario'] = $idFuncionario;
           echo json_encode(['success' => true, 'message' => 'Login foi realizado com sucesso', 'idFuncionario' => $idFuncionario]);
   
       }else{
           //Login inválido
          //print_r('Erro de login');
   
           echo json_encode(['success' => false, 'message' => 'Email ou Senha inválido']);
       }
   
     //print_r($_POST['email']);
   }
   


