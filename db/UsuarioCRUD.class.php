<?php
class UsuarioCRUD implements InterfaceCRUD{
      private $instanciaConexaoPdoAtiva;
      private $tabela;

      public function __construct(){
          $this->instanciaConexaoPdoAtiva = PdoConexao::getInstancia();
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

      public function login($email, $senha){
          // Criando string do select
          $sql = "select * from {$this->tabela} where email=:email and senha=:senha";
          try{
            // Preparando a consulta
              $operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
              // Ligando os valores da string aos valores da função
              $operacao->bindValue(":email", $email, PDO::PARAM_STR);
              $operacao->bindValue(":senha", $senha, PDO::PARAM_STR);
              // Execultando a consulta
              $operacao->execute();
              // Verificando se a consulta retornou pelo menos um registro
              if($operacao->rowCount() > 0){
                //
                  $linha = $operacao->fetch(PDO::FETCH_OBJ);
                  return $linha;
              }else {
                return false;
              }
          }catch(PDOException $excecao){
              echo $excecao->getMessage();
          }
      }
}
?>