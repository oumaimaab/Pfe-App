<?php
$file="../Config/DataBase2.php";
if (file_exists($file)){
    include('../Config/DataBase2.php');
}
else{
    include('../../Config/DataBase2.php');
}
class ReqController
{
    private $pdo;

    function __construct()
    {
        $db = new DataBase2();
        $this->pdo = $db->connexionBdd();
    }

    function findOne($query, $params)
    {
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);
            if ($stmt->rowCount() == 1) {
                return $stmt->fetchAll();
            }
            return null;
        } catch (PDOException $e) {
            error_log(date("Y-m-d h:m:s") . " " . $e->getMessage(), 3,"../../fichiers/log.log");
        }
    }

    public function findMany($query, $params)
    {
        echo 'string';
        try {

            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);
            $L = array();
            while ($row = $stmt->fetch()) {
                $L[] = $row;
            }
            return $L;
        } catch (PDOException $e) {
            $e->getMessage();
            error_log(date("Y-m-d h:m:s") . " " . $e->getMessage(), 3, ROOT . "log_file.log");
        }
    }

    function findAll($query)
    {
        try {
            $stmt = $this->pdo->query($query);
            $L = array();
            while ($row = $stmt->fetch()) {
                $L[] = $row;
            }
            return $L;
        } catch (PDOException $e) {
            error_log(date("Y-m-d h:m:s") . " " . $e->getMessage(), 3, ROOT . "log_file.log");
        }
    }

    function insert($query, $params)
    {
        try {
            $res = $this->pdo->prepare($query);
            if ($res->execute($params)) {
                return true;
            }
        } catch (PDOException $e) {
            error_log(date("Y-m-d h:m:s") . " " . $e->getMessage(), 3, ROOT . "log_file.log");
            return false;
        }
    }

    function update($query, $params)
    {
        try {
            $res = $this->pdo->prepare($query);
            $res->execute($params);
        } catch (PDOException $e) {
            error_log(date("Y-m-d h:m:s") . " " . $e->getMessage(), 3, "../../fichiers/log.log");
            return false;
        }
    }

    function delete($query, $params)
    {
        try {
            $res = $this->pdo->prepare($query);
            $res->execute($params);
            $deleted = $res->rowCount();
            return $deleted;
        } catch (PDOException $e) {
            error_log(date("Y-m-d h:m:s") . " " . $e->getMessage(), 3, ROOT . "log_file.log");
        }
    }

    function protect($string)
    {
        return $this->pdo->quote(htmlspecialchars($string));
    }
}