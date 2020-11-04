<?php
class Usuario{
  private $id = null;
  private $nome;
  private $email;
  private $senha;

  public function __construct($nome, $email, $senha){
      $this->nome = $nome;
      $this->email = $email;
      $this->senha = $senha;
  }

  // Métodos get
  public function getId(){
    return $this->id;
  }
  public function getNome(){
    return $this->nome;
  }
  public function getEmail(){
    return $this->email;
  }
  public function getSenha(){
    return $this->senha;
  }

  // Métodos set
  public function setId($id){
    $this->id = $id
  }
  public function setNome($nome){
    $this->nome = $nome
  }
  public function setEmail($email){
    $this->emai = $email
  }
  public function setSenha($senha){
    $this->senha = $senha
  }

}
?>