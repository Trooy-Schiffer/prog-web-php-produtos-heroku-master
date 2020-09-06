<?php

require_once(__DIR__ . '/../../templates/template-html.php');

require_once(__DIR__ . '/../../db/Db.php');
require_once(__DIR__ . '/../../model/Cliente.php');
require_once(__DIR__ . '/../../dao/DaoCliente.php');
require_once(__DIR__ . '/../../config/config.php');

$conn = Db::getInstance();

if (!$conn->connect()) {
    die();
}

$daoCliente = new DaoCliente($conn);
$cliente = $daoCliente->porId($_POST['id']);

if ($cliente) {
    $cliente->setNome($_POST['nome']);
    $cliente->setSobrenome($_POST['sobrenome']);
    $cliente->setEmail($_POST['email']);
    $cliente->setTelefone($_POST['telefone']);
    $cliente->setDataNascimento($_POST['dataNascimento']);
    $cliente->setCEP($_POST['cep']);
    $cliente->setEndereco($_POST['endereco']);
    $cliente->setBairro($_POST['bairro']);
    $cliente->setCidade($_POST['cidade']);
    $cliente->setEstado($_POST['estado']);
    $daoCliente->atualizar($cliente);
}

header('Location: ./index.php');
