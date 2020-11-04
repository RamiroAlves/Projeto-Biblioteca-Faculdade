<?php
class PdoConexao{
  private static $instancia;

  public static function getInstancia(){
    // Verificando se o objeto instancia existe
    if(!isset(self::$instancia)){

      try{
        // Dados para conexao com o mysql
        $dns = 'mysql:host=localhost;dbname=biblioteca';
        $usuario = 'root';
        $senha = '';

        // Criação da conexão
        self::$instancia = new PDO($dns, $usuario, $senha);

        self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }catch(PDOException $excecao){
          echo $excecao->getMessage();
          // Finalizando a ação
          exit();
      }
    }
    return self::$instancia;
  }

}

?>