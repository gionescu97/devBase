<?php
class DbWrapper {
    function __construct() {
        /** @var DbConnection */
        $this->dbCon = null;
    }

    function setDbConnection($con) {
        $this->dbCon = $con;
    }
}
