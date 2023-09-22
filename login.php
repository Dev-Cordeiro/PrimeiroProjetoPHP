<?php 
    require_once'usuarios.php';
    $u= new usuario;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Projeto_login</title>
</head>
<body>
    
    <div class="login">
        <h1>Login</h1>
        <form method="POST">
            <input type="email" placeholder="Usuario" name="email">
            <br><br>
            <input type="password" placeholder="Senha" name="senha">
            <br><br>
            <a href="cadastrar.php">Cadastrar-Se</a>
            <br><br>
            <input type="submit" placeholder="Acessar">
        </form>
        
    </div>

    <?php 
        
        if (isset($_POST['email']))
        {  
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
        //verifica se preencheu
            if(!empty($email) && !empty($senha))
            {   
                $u->conectar("primeiroprojeto","localhost",'root',"");
                if ($u->msgerror =="")
                    if( $u ->logar($email,$senha))
                    {
                        header("location: AreaPrivada.php");
                    }
                    else
                    {
                        ?>
                        <div class="msg-erro_login">
                            Email e/ou senha invalida!!!
                        </div>
                        <?php 
                    }
                else
                    {
                        echo "Erro".$u -> msgerror;
                    }
            }
            else
            {

                ?>
                <div class="msg-erro_login">
                    Preencha todos os campos!
                </div>
                <?php 
            }
        }
    ?>
</body>

</html>