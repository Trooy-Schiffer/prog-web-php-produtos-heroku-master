<?php

require_once(__DIR__ . '/../../db/Db.php');
require_once(__DIR__ . '/../../model/Cliente.php');
require_once(__DIR__ . '/../../dao/DaoCliente.php');
require_once(__DIR__ . '/../../config/config.php');

$conn = Db::getInstance();

if (!$conn->connect()) {
    die();
}

$daoCliente = new DaoCliente($conn);
$daoCliente->inserir(new Cliente($_POST['nome'], $_POST['sobrenome'], $_POST['email'], $_POST['telefone'], $_POST['dataNascimento'], $_POST['cep'], $_POST['endereco'], $_POST['bairro'], $_POST['cidade'], $_POST['estado']));

header('Location: ./index.php');
