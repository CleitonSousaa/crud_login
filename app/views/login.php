<?php
 include_once("./app/database/conexao.php");
?>
<?php 
    class Usuario{
        public function login($usuario, $senha){
            global $pdo;
            $sql = "SELECT * FROM cadastros WHERE usuario = :usuario AND senha = :senha";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("usuario", $usuario);
            $sql->bindValue("senha", $senha);
            $sql->execute();

            if($sql->rowCount() > 0){
                $dado = $sql->fetch();
                $_SESSION['iduser'] = $dado['usuario'];
                return true;
            }else{
                return false;
            }
        }
    }
?>


<form  method="post" class="conteiner_formulario" autocomplete="off">
        <h1>MEMBER LOGIN</h1>
        <p class="usuario">
            <input type="text" name="usuario" id="idname" placeholder="Username" pattern="[a-zA-Z]*"
            class="imput">
        </p>
        <p class="senha">
            
            <input type="password" name="senha" id="idsenha" placeholder="Password">
        </p>
        <input type="submit" value="LOGIN" class="login">
</form>


<?php 
    if(isset($_POST["usuario"]) && !empty($_POST["usuario"]) && isset($_POST["senha"]) && !empty($_POST["senha"])){
        $u = new Usuario();
        $usuario = addslashes($_POST["usuario"]);
        $senha = addslashes($_POST["senha"]);
        if($usuario == 'admin' && $senha == 'admin'){
            header("Location: http://localhost/crud_login/app/helpers/interface_controle.php");
        }
        if($u->login($usuario, $senha) == true){
            if(isset($_SESSION['iduser'])){
                header("Location: http://localhost/crud_login/pagina_principal.php");
            }else{}
        }else{
            echo'usuario nao existe';
        }
    }else{}
    $sql = $pdo->prepare("SELECT * FROM cadastros");
    $sql->execute();
    $fetchClientes = $sql->fetchAll();
    $pdo = null;
?>
