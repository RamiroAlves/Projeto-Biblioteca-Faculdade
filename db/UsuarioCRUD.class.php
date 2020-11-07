<?php
class UsuarioCRUD implements InterfaceCRUD{
      private $instanciaConexaoPdoAtiva;
      private $tabela;

      public function __construct(){
          $this->instanciaConexaoPdoAtiva = PdoConexao::getInstancia();
          $this->tabela = 'tbusuario';
      }

      public function salvar($objeto){
        $id = null;
        $nome = $objeto->getNome();
        $email = $objeto->getEmail();
        $senha = $objeto->getSenha();
        $sql = "insert into {$this->tabela} (id_usuario, nome, email, senha) values (:id, :nome, :email, :senha)";
        try{
            $operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
            $operacao->bindValue(":id", $id, PDO::PARAM_INT);
            $operacao->bindValue(":nome", $nome, PDO::PARAM_STR);
            $operacao->bindValue(":email", $email, PDO::PARAM_STR);
            $operacao->bindValue(":senha", $senha, PDO::PARAM_STR);
            // Testando o insert
            if($operacao->execute()){
                if($operacao->rowCount() > 0){
                    return true;
                }else{
                  return false;
                }
            }else{
              return false;
            }
        }catch(PDOException $excecao){
            echo $excecao->getMessage();
        }
      }

      public function atualizar($object){
        return true;
      }

      public function ler($id){
        return true;
      }

      public function apagar($id){
          $sql = "delete from {$this->tabela} where id_usuario=:id";
          try{
            $operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
            $operacao->bindValue(":id", $id, PDO::PARAM_INT);
            if($operacao->execute()){
                if($operacao->rowCount()>0){
                  return true;
                }else{
                  return false;
                } 
            }else{
                return false;
            }
          }catch(PDOException $excecao){
            echo $excecao->getMessage();
          }
      }

      public function consultar($sql){
          try{
              //Preparando sql
              $operacao= $this->instanciaConexaoPdoAtiva->prepare($sql);
              //Execultando a consulta
              $operacao->execute();
              //Convertendo a consuta em array
              $linhas = $operacao->fetchAll();
              //Retornando o array como resultado
              return $linhas;
          }catch(PDOException $excecao){
              //Mostrando o erro
              echo $excecao->getMessage();
          }
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