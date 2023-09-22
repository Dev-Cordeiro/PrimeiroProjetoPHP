<?php 
    class usuario{
        private $pdo;
        public $msgerror ="";
        public function conectar ($nome,$host,$usuario,$senha)
        {
            try{
                $this->pdo = new PDO(DB_RM .":server=". DB_HOST_RM . ";database=" . DB_NAME_RM, DB_USER_RM, DB_PASS_RM, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                
            } catch (PDOException $e){
                $this->msgerror = $e->getMessage();
                
            }
        }
        public function cadastrar ($nome,$telefone,$email,$senha)
        {
            
            //Verificar se ja tem email cadastrado
            $sql = $this->pdo->prepare("SELECT id_usuarios from usuarios where email = :e");
            $sql -> bindValue(":e",$email);
            $sql ->execute();
            if ($sql -> rowCount() > 0)
            {
                return false; //Ja esta cadastrado
            }
            //Caso não esteja
            else{
                $sql = $this->pdo->prepare("INSERT INTO usuarios (nome,telefone,email,senha) VALUES (:n,:t,:e,:s)");
                $sql -> bindValue(":n",$nome);
                $sql -> bindValue(":t",$telefone);
                $sql -> bindValue(":e",$email);
                $sql -> bindValue(":s",md5($senha));
                $sql -> execute();
                return true;
            }
        }

        
        public function logar ($email,$senha)
        {
            
            //Verificar se o email ja estar cadastrado, se sim
            $sql = $this->pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha));
            $sql->execute();
            
            if ($sql -> rowCount() >0)
            {
                
                //Entrar no sistema (acessar)
                $dado = $sql -> fetch();
                session_start();
                $_SESSION['id_usuario'] = $dado['id_usuario'];
                return true; //cadastrado com sucesso
                
            }
            else
            {

                return false; //Não foi possivel logar
                
            }
        }

        
    }
        
   
            

    

?>