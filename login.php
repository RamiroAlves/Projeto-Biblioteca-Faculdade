<?php
  // Verificando se os valores da página de index estão chegando
  if(isset($_POST['email']) && isset($_POST['senha'])){
    // Importando arquivos
    include('db/PdoConexao.class.php');
    include('db/InterfaceCRUD.class.php');
    include('db/Usuario.class.php');
    include('db/UsuarioCRUD.class.php');
    //Criar um projeto usuarioCRUD
    $usuarioCRUD = new UsuarioCRUD();
    //Realizando o método login da classe UsuarioCRUD
    $login = $usuarioCRUD->login($_POST['email'], $_POST['senha']);
  
    if($login == false){
      header('Location: index.php?mess=erro');
    } else{
      // Inicializando a sessão
     session_start();
     //Criando uma variável de sessão chamada login
     $_SESSION['login'] = 'ok';
      header('Location: principal.php?mess=ok');
    }
  }
?>