<?php
class Conexao extends PDO {

private static $instancia;
public $handle = null;

public function Conexao($dsn="", $username = "", $password = "") {
    // construtor PDO
    try {
//aqui ela retornarÃ¡ o PDO em si, veja que usamos parent::_construct()
        if ($this->handle == null) {
            //$dbh = parent::__construct(DB_RM .":host=". DB_HOST_RM . ";dbname=" . DB_NAME_RM, DB_USER_RM, DB_PASS_RM, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $dbh = parent::__construct(DB_RM .":server=". DB_HOST_RM . ";database=" . DB_NAME_RM, DB_USER_RM, DB_PASS_RM, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            echo "Conexão Realizada";
        }
        $this->handle = $dbh;
        return $this->handle;
    } catch (PDOException $e) {
        echo 'Falha ao conectar com a Base de dados. Erro: ' . $e->getMessage();
        return false;
    }
}

public static function getInstance() {
    // Criar uma instacia se nao existe
    if (!isset(self::$instancia)) {
        try {
            self::$instancia = new Conexao(DB_RM .":host=". DB_HOST_RM . ";dbname=" . DB_NAME_RM, DB_USER_RM, DB_PASS_RM);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    return self::$instancia;
}

//aqui criamos um objeto de fechamento da conexÃ£o
function __destruct() {
    $this->handle = NULL;
}

}

?>