<?php include_once("../database/conexao.php");?>

    <title>Pagina Novo Usuario</title>
    <link rel="stylesheet" href="./assets/css/novo_usuario.css">
<body>
    <div>
        <a href="http://localhost/crud_login/"></a>   
        <form  method="post"  class="conteiner_formulario">
            <h1>REGISTER USERS</h1>
            <p class="usuario"><i class="fa-solid fa-user"></i><input type="text" name="usuario" id="idname" placeholder="New Username" autocomplete="off"></p>
            <p class="senha"><i class="fa-sharp fa-solid fa-lock"></i><input type="password" name="senha" id="idsenha" placeholder=" New Password" autocomplete="off"></p>
            <input type="submit" value="REGISTER" class="login">
        </form> 
    </div>
    <?php 
        $sql = 'SELECT COUNT(*) FROM cadastros';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $quantidadeUsuarios = $stmt->fetchColumn();
        $total = $quantidadeUsuarios + 1;
        if(isset($_POST['usuario'])){
            $sql = $pdo->prepare("INSERT INTO cadastros VALUES ($total, ?,?)");
            $sql->execute(array($_POST['usuario'], $_POST['senha']));
            header("Location: http://localhost/crud_login/");
        }
    ?>
</body>