<?php
class DbConnection {
    function __construct($host, $dbname, $user, $pass) {
        $this->dbConnection = new PDO("mysql:host={$host};dbname={$dbname}", $user, $pass);
        $this->dbConnection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }

    function query($query, $args = [], $fetchStyle = PDO::FETCH_OBJ) {
        $stmnt = $this->dbConnection->prepare($query);
        $stmnt->execute($args);
        $result = $stmnt->fetchAll($fetchStyle);

        return $result;
    }

    function getError() {
        $err = $this->dbConnection->errorInfo();
        return $err;
    }

    function lastInsertId() {
        return $this->dbConnection->lastInsertId();
    }
}
