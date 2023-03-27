<?php

class Produto {
    private $id;
    private $nome;
    private $descricao;
    private $codigo_barras;
    private $qtde_estoque;
    private $ativo;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getCodigoBarras(){
        return $this->codigo_barras;
    }

    public function setCodigoBarras($codigoBarras){
        $this->codigo_barras = $codigoBarras;
    }

    public function getQtdeEstoque(){
        return $this->qtde_estoque;
    }

    public function setQtdeEstoque($qtdeEstoque){
        $this->qtde_estoque = $qtdeEstoque;
    }

    public function getAtivo(){
        return $this->ativo;
    }

    public function setAtivo($ativo){
        $this->ativo = $ativo;
    }
}