<?php
    if(isset($_POST['nome'])){
      include('../../db/PdoConexao.class.php');
      include('../../db/Usuario.class.php');
      include('../../db/InterfaceCRUD.class.php');
      include('../../db/UsuarioCRUD.class.php');
      //Criação do objeto usuário
      $usuario = new Usuario($_POST['nome'], $_POST['email'], $_POST['senha']);

      //Criando objeto da classe CRUD
      $usuarioCRUD = new UsuarioCRUD();

      if($usuarioCRUD->salvar($usuario)){
        header('Location: ../../usuario/frmcad.php?mess=ok');
      }else{
                header('Location: ../../usuario/frmcad.php?mess=erro');
      }
    }
?>