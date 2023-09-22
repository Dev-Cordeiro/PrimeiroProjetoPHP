<?php 
    include "Barra-Superior.html"

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        
        class Connect{

        
        public function conectar ($nome,$host,$usuario,$senha)
        {
            try{
                $db = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
                
            } catch (PDOException $e){
                $erro = $e->getMessage();
                
            }
        
            // Cria uma consulta SQL para recuperar todos os registros da tabela "usuarios"
            $sql = "SELECT * FROM usuarios";
        
            // Executa a consulta SQL e armazena os resultados em um array associativo
            $result = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        
            // Verifica se há resultados a serem exibidos
            if (count($result) > 0) {
                // Exibe a lista de registros
                echo '<div class="modulo">';
                echo '<ul>';
                foreach ($result as $row) {
                    $id = $row['id_usuario'];
                    $nomeRe =$row['nome'];
                    $emailRe = $row['email'];
                    $telefoneRe = $row['telefone'];
                    echo "</br>";
                    echo "<div class = separador>";
                    echo "</br>";
                    echo '<li id = ID>ID: ' . $id . '</li>';
                    echo '<li>Nome: ' . $nomeRe . '</li>';
                    echo '<li>E-mail: ' . $emailRe . '</li>';
                    echo '<li>Telefone: ' . $telefoneRe . '</li>';
                    
                }
                echo '</ul>';
                echo '</div>';
            } else {
                echo 'Nenhum registro encontrado.';
            }
        }
    }

    $connect = new Connect();

    // Chama a função conectar passando os parâmetros necessários
    $connect->conectar("primeiroprojeto", "localhost", "root", "");
    ?>

        

</body>
</html>