<?php
require_once(__DIR__ . '/../model/Cliente.php');
require_once(__DIR__ . '/../db/Db.php');

// Classe para persistencia de Produtos 
// DAO - Data Access Object
class DaoCliente
{

    private $connection;

    public function __construct(Db $connection)
    {
        $this->connection = $connection;
    }

    public function porId(int $id): ?Cliente
    {
        $sql = "SELECT nome, sobrenome, email, telefone, dataNascimento, cep, endereco, bairro, cidade, estado
            FROM clientes             
            WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $prod = null;
        if ($stmt) {
            $stmt->bind_param('i', $id);
            if ($stmt->execute()) {
                $stmt->bind_result($nome, $sobrenome, $email, $telefone, $dataNascimento, $cep, $endereco, $bairro, $cidade, $estado);
                $stmt->store_result();
                if ($stmt->num_rows == 1 && $stmt->fetch()) {
                    $cli = new Cliente($nome, $sobrenome, $email, $telefone, $dataNascimento, $cep, $endereco, $bairro, $cidade, $estado, $id);
                }
            }
            $stmt->close();
        }
        return $cli;
    }

    public function inserir(Cliente $cliente): bool
    {
        $sql = "INSERT INTO clientes (nome,sobrenome,email,telefone,dataNascimento,cep,endereco,bairro,cidade,estado) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connection->prepare($sql);
        $res = false;
        if ($stmt) {
            $nome = $cliente->getNome();
            $sobrenome = $cliente->getSobrenome();
            $email = $cliente->getEmail();
            $telefone = $cliente->getTelefone();
            $dataNascimento = $cliente->getDataNascimento();
            $cep = $cliente->getCep();
            $endereco = $cliente->getEndereco();
            $bairro = $cliente->getBairro();
            $cidade = $cliente->getCidade();
            $estado = $cliente->getEstado();
            $stmt->bind_param('ssssssssss', $nome, $sobrenome, $email, $telefone, $dataNascimento, $cep, $endereco, $bairro, $cidade, $estado);
            if ($stmt->execute()) {
                $id = $this->connection->getLastID();
                $cliente->setId($id);
                $res = true;
            }
            $stmt->close();
        }
        return $res;
    }

    public function remover(Cliente $cliente): bool
    {
        $sql = "DELETE FROM clientes where id=?";
        $id = $cliente->getId();
        $stmt = $this->connection->prepare($sql);
        $ret = false;
        if ($stmt) {
            $stmt->bind_param('i', $id);
            $ret = $stmt->execute();
            $stmt->close();
        }
        return $ret;
    }

    public function atualizar(Cliente $cliente): bool
    {
        $sql = "UPDATE clientes SET nome=?, sobrenome=?, email=?, telefone=?, dataNascimento=?, cep=?, endereco=?, bairro=?, cidade=?, estado=? WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $ret = false;
        if ($stmt) {
            $nome = $cliente->getNome();
            $sobrenome = $cliente->getSobrenome();
            $email = $cliente->getEmail();
            $telefone = $cliente->getTelefone();
            $dataNascimento = $cliente->getDataNascimento();
            $cep = $cliente->getCep();
            $endereco = $cliente->getEndereco();
            $bairro = $cliente->getBairro();
            $cidade = $cliente->getCidade();
            $estado = $cliente->getEstado();
            $id   = $cliente->getId();
            $stmt->bind_param('ssssssssssi', $nome, $sobrenome, $email, $telefone, $dataNascimento, $cep, $endereco, $bairro, $cidade, $estado, $id);
            $ret = $stmt->execute();
            $stmt->close();
        }
        return $ret;
    }


    public function todos(): array
    {
        $sql = "SELECT id, nome, sobrenome, email, telefone, dataNascimento, cep, endereco, bairro, cidade, estado
            FROM clientes";
        $stmt = $this->connection->prepare($sql);
        $clientes = [];
        if ($stmt) {
            if ($stmt->execute()) {
                $id = 0;
                $nome = '';
                $stmt->bind_result(
                    $id,
                    $nome,
                    $sobrenome,
                    $email,
                    $telefone,
                    $dataNascimento,
                    $cep,
                    $endereco,
                    $bairro,
                    $cidade,
                    $estado
                );
                $stmt->store_result();
                while ($stmt->fetch()) {
                    $clientes[] = new Cliente($nome, $sobrenome, $email, $telefone, $dataNascimento, $cep, $endereco, $bairro, $cidade, $estado, $id);
                }
            }
            $stmt->close();
        }
        return $clientes;
    }
};
