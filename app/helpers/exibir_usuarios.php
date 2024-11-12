<?php include_once("../database/conexao.php");?>

<head>
    <link rel="stylesheet" href="../assets/css/exibir_usuarios.css">
</head>
<body>
    <div> 
        <h1>Usuarios</h1>
        <?php 
            $sql = $pdo->prepare("SELECT * FROM cadastros");
            $sql->execute();
            $fetchClientes = $sql->fetchAll();
            foreach($fetchClientes as $key => $value){
                echo 'USUARIO: '.$value['usuario']. '<br>'. 'SENHA: '. $value['senha']. '<hr>'; 
            };
        ?>
        <a href="http://localhost/crud_login/" class="return">RETURN</a>
        <?php 
            echo'<br>';
        ?>
        <a href="http://localhost/crud_login/app/helpers/delete_itens.php" class='delete'>EXCLUIR USUARIO</a>
    </div>
</body>
