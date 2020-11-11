<?php
    if(isset($_POST['isbn'])){
      include('../../db/PdoConexao.class.php');
      include('../../db/InterfaceCRUD.class.php');
      include('../../db/Acervo.class.php');
      include('../../db/AcervoCRUD.class.php');
      //Criando objeto acervo
      $acervo = new Acervo($_POST['isbn'], $_POST['autor'], $_POST['titulo'], $_POST['ano_publicacao'], $_POST['editora'], $_POST['npaginas'], $_POST['exemplar']);

      //Adicionando o id desse acervo
      $acervo->setId($_POST['id']);
      $acervoCRUD = new AcervoCRUD();

      if($acervoCRUD->atualizar($acervo)){
        header('Location: ../../acervo/frmbusca.php?id=updateok');
      }else{
        header('Location: ../../acervo/frmbusca.php?id=updateerro');        
      }
    }
?>