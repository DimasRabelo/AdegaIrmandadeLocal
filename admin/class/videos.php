<?php

require_once('conexao.php');


class VideosClass
{
    public $idVideo;

    public $urlVideo;

    public $dataPublicacao;

    public $statusVideos;

    public function listarUrlVideos()
    {
        $sql = "SELECT * FROM tblurlvideos ORDER BY idVideo ASC;";
        $conn = Conexao::LigarConexao();
        $resultado = $conn->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    

    public function desativar()
    {
        $query = "UPDATE tblurlvideos SET statusVideos ='DESATIVADO' WHERE idVideo = " . $this->idVideo;

        $conn = Conexao::LigarConexao();
        $conn->exec($query);
    }


    public function Carregar()
    {
        $query = "SELECT * FROM tblurlvideos WHERE idVideo = " . $this->idVideo;
        $conn = Conexao::LigarConexao();
        $resultado = $conn->query($query);
        $lista = $resultado->fetchAll();

        foreach ($lista as $linha) {
           
            $this->statusVideos = $linha['statusVideos'];
            $this->urlVideo = $linha['urlVideo'];
            $this->dataPublicacao = $linha['dataPublicacao'];
           
        }
    }

    public function __construct($id = false)
    {
        if ($id) {
            $this->idVideo = $id;
            $this->Carregar();
        }
    }
    public function ativar()
    {
        $query = "UPDATE tblurlvideos SET statusVideos ='ATIVO' WHERE idVideo = " . $this->idVideo;
        $conn = Conexao::LigarConexao();
        $conn->exec($query);
    }
    



    public function Atualizar()
    {
        $query = "UPDATE tblurlvideos 
                  SET  statusVideos = '" . $this->statusVideos . "',
                       urlVideo = '" . $this->urlVideo . "',
                       dataPublicacao = '" . $this->dataPublicacao . "'
                  WHERE tblurlvideos.idVideo = '" . $this->idVideo . "'";
    
        $conn = Conexao::LigarConexao();
        $conn->exec($query);
        echo "<script>document.location='index.php?p=videos'</script>";
    }
}
