<?php
    if(isset($_POST['nome'])){
      include('../../db/PdoConexao.class.php');
      include('../../db/InterfaceCRUD.class.php');
      include('../../db/Usuario.class.php');
      include('../../db/UsuarioCRUD.class.php');
      //Criando objeto usuario
      $usuario = new Usuario($_POST['nome'], $_POST[email], $_POST['senha']);

      $usuario->setId($_POST['id']);
      $usuarioCRUD = new UsuarioCRUD();

      if($usuarioCRUD->atualizar($usuario)){
        header('Location: ../../usuario/frmbusca.php?id=updateok');
      }else{
        header('Location: ../../usuario/frmbusca.php?id=updateerro');        
      }
    }
?>