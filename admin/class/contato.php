<?php

require_once ('conexao.php');





class ContatoClass {

    public $nomeContato;
    public $emailContato;
    public $telefoneContato;
    public $mensagemContato;

    public $statusContato;

    public function Inserir() {
        $sql = "INSERT INTO tblcontato (nomeContato, emailContato, telefoneContato, mensagemContato) 
        VALUES ('".$this->nomeContato."','".$this->emailContato."','".$this->telefoneContato."','".$this->mensagemContato."')";
    
        $conn = Conexao::LigarConexao();
        $conn->exec($sql);
        




}

public function ListarAtivos(){
    
    $sql =  "SELECT * FROM tblcontato WHERE statusContato = 'ATIVO' ORDER BY idContato ASC";
    $conn = Conexao::LigarConexao();
    $resultado = $conn->query($sql);
    $lista = $resultado->fetchAll();
    return $lista;
    
}

public function ListarDesativados()
{
    $sql = "SELECT * FROM tblcontato WHERE statusContato = 'DESATIVADO' ORDER BY idContato ASC";
    $conn = Conexao::LigarConexao();
    $resultado = $conn->query($sql);
    $lista = $resultado->fetchAll();
    return $lista;
}

public function ListarRespondidos()
{
    $sql = "SELECT * FROM tblContato WHERE statusContato = 'RESPONDIDO' ORDER BY idContato ASC";
    $conn = Conexao::LigarConexao();
    $resultado = $conn->query($sql);
    $listaDesativados = $resultado->fetchAll();
    return $listaDesativados;
}





} 

// Fim da class Contato


