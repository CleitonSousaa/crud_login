<?php include_once("..//database/conexao.php");?>

<?php include_once("../views/header.php"); ?>
    <title>pagina excluir usuarios</title>
    <link rel="stylesheet" href="app/assets/css/login.css">

    <body>
        <div>
            <h1>Excluir Usuarios</h1>
            <?php 
                if(isset($_GET['delete'])){
                    $id = (int)$_GET['delete'];
                    $pdo->exec("DELETE FROM cadastros WHERE id=$id");
                    echo '<script>
                            alert("Deletado com sucesso");
                            setTimeout(function() {
                            window.location.href = "http://localhost/crud_login/app/helpers/interface_controle.php";
                            }, 100); // 100ms de atraso
                        </script>';
                        exit();
                }
            ?>

            <?php 
                $sql = $pdo->prepare("SELECT * FROM cadastros");
                $sql->execute();
                $fetchClientes = $sql->fetchAll();
                foreach($fetchClientes as $key => $value){
                    echo '<a href="?delete='.$value['id'].'" class="botao_excluir"> X <a/>'.' USUARIO: '.$value['usuario'];
                    echo '<hr>';
                };
            ?>
        </div>
    </body>
<?php include_once("../views/footer.php"); ?>