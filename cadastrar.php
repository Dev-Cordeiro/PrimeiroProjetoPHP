<?php 
    require_once"usuarios.php";
    $u= new usuario;
    if (isset($_POST['nome']))
    {
        $nome = addslashes($_POST['nome']);
        $telefone = addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $confsenha = addslashes($_POST['confsenha']);
        //verifica se preencheu
        if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confsenha))
        {
            $u->conectar("primeiroprojeto","localhost",'root',"");
            if($u->msgerror =="")
            {
                if ($senha == $confsenha)
                {
                    if($u->cadastrar($nome,$telefone,$email,$senha))
                    {
                        ?>
                        <div id="msg-sucesso">
                            Cadastrado com sucesso! Acesse para entrar
                        </div>
                        <?php 
                    }
                    else
                    {
                        ?>
                        <div class="msg-erro">
                            Email ja cadastrado!!
                        </div>
                        <?php 
                    }
                }
                else
                {
                    ?>
                    <div class="msg-erro">
                        Senha e confirmar senha não correspondem!
                    </div>
                    <?php 
                    
                }
                
            }
            else{
                echo "Erro: ".$u->msgerror;
            }
        }else
        {   
            ?>
            <div class="msg-erro">
                Preencha todos os campos
            </div>
            <?php 
        }
    }
    

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

    <div class="cadastro">
        <h1>Cadastro</h1>
        <form method="POST" action="cadastrar.php">
            <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
            <br><br>
            <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
            <br><br>
            <input type="email" name="email" placeholder="Usuario" maxlength="40">
            <br><br>
            <input type="Senha" name="senha" placeholder="Senha" maxlength="15">
            <br><br>
            <input type="Senha" name="confsenha" placeholder="Confirmar Senha" maxlength="15">
            <br><br>
            <br><br>
            <input type="submit" value="Cadastrar">
        </form>
    </div>
    <a href="login.php"><img id= imagem_seta src="atras.png" alt=""></a>
</body> 
</html>