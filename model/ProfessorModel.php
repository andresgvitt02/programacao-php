<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/' . FOLDER . '/database/DataBase.php';


class ProfessorModel
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

        $dadosArray = $this->database->executeSelect("SELECT * FROM professores");

        return $dadosArray;
    }

    public function salvarModel(string $nome, int $idade) 
    {
        $sql = "INSERT INTO professores (nome, idade) values ('$nome', '$idade')";
        $this->database->insert($sql);
    }

    public function buscarPeloId(int $id)
    {
        $professorArray = $this->database->executeSelect("SELECT * FROM professores WHERE id = '$id'");
        return $professorArray[0];

    }

    public function atualizarModel(int $id, string $nome, int $idade)
    {
        $sql = "UPDATE professores set nome='$nome', idade='$idade' WHERE id='$id'";
        $this->database->insert($sql);
    }

    public function excluirModel(int $id)
    {
        $sql = "DELETE FROM  professores WHERE id='$id'";
        $this->database->insert($sql);
    }
}