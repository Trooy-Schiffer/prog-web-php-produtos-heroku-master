<?php

class Cliente
{

    private $id;
    private $nome;
    private $sobrenome;
    private $email;
    private $telefone;
    private $dataNascimento;
    private $cep;
    private $endereco;
    private $bairro;
    private $cidade;
    private $estado;

    public function __construct(string $nome = '', string $sobrenome = '', string $email = '', string $telefone = '', string $dataNascimento = '', string $cep = '', string $endereco = '', string $bairro = '', string $cidade = '', string $estado = '', int $id = -1)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->dataNascimento = $dataNascimento;
        $this->cep = $cep;
        $this->endereco = $endereco;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;
    }

    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getEstado()
    {
        return $this->estado;
    }
};
