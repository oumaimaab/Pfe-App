<?php

include('../app/Config/DataBase.php');

class ListePfe
{
    public function getDataBase(){
        $dataBaseClass = new DataBase();
        return $dataBaseClass;
    }
}