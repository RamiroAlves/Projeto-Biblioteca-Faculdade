<?php
class UsuarioCRUD implements InterfaceCRUD{
      private $instanciaConexaoPdoAtiva;
      private $tabela;

      public function __construct(){
          $this->$instanciaConexaoPdoAtiva = PdoConexao::getInstancia();
          $this->tabela = 'tbusuario';
      }

      public function salvar($object){
        return true;
      }

      public function atualizar($object){
        return true;
      }

      public function ler($id){
        return true;
      }

      public function apagar($id){
        return true;
      }
}
?>