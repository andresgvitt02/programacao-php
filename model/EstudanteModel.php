<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/aula04/database/DataBase.php';


class EstudanteModel
{
    private int $idade;

    private string $nome;

    private $database;

    //Getters and setters

    public function __construct()
    {
        $this->database = new DataBase();
    }

    public function listarModel():array
    {
        
        //$array = array(1, 2, 3, 4, 5);
        //$array = array["joão", "lucas", "maria", "clara"];

        $dadosArray = $this->database->executeSelect("SELECT * FROM estudantes");

        return $dadosArray;
    }

    public function salvarModel(string $nome, int $idade) 
    {
        $sql = "INSERT INTO estudantes (nome, idade) values ('$nome', '$idade')";
        $this->database->insert($sql);
    }
}