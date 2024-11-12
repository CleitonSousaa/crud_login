<?php include_once("..//database/conexao.php")?>

<?php include_once("../views/header.php"); ?>
    <title>Pagina Recuperar Senha</title>
    <link rel="stylesheet" href="../assets/css/recuperar_senha.css">
    <body> 
        <div>
            
            <?php
                $valor = addslashes($_POST["novaSenha"]?? '0');
                if($valor == 0){
                }else{
                    if(isset($_GET['delete'])){
                        $id = (int)$_GET['delete'];
                        $pdo->exec("UPDATE cadastros SET  senha = $valor WHERE id = $id  ");
                        echo'alterado com sucesso';
                    }else{
                        echo'escholha a nova senha';
                    }  
                }
            ?>
            <h1>Listar Usuarios</h1>
            <?php 
                $sql = $pdo->prepare("SELECT * FROM cadastros");
                $sql->execute();
                $fetchClientes = $sql->fetchAll();
                foreach($fetchClientes as $key => $value){
                    echo 'USUARIO: '.$value['usuario'].'<hr>'; 
                };
            ?>
            <!--
            <form method="post">
                <span>
                    Nova senha: <br>
                    <input type="text" name="novaSenha" autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                    <input type="submit" value="escolher">
                </span>
            </form>
            -->
            <a href="http://localhost/crud_login/"></a>
        </div>
    </body>
<?php include_once("../views/footer.php"); ?>