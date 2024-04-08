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
        $query = "UPDATE tblurlvideos SET statusVideos ='DESATIVADO' WHERE idVideos = " . $this->idVideo;

        $conn = Conexao::LigarConexao();
        $conn->exec($query);
    }































}