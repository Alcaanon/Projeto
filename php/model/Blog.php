<?php

class Blog
{
    private int $id;
    private string $classe;
    private string $titulo;
    private string $descricao;
    private string $nome;
    private string $data;
    private int $categoriaid;
    private string $criadoem;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getClasse(): string
    {
        return $this->classe;
    }

    public function setClasse(string $classe): void {
        $this->classe = $classe;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): void {
        $this->titulo = $titulo;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void {
        $this->descricao = $descricao;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function setData(string $data): void {
        $this->data = $data;
    }   

    public function getCategoriaId(): int {
        return $this->categoriaid;
    }

    public function setCategoriaId(int $categoriaid): void {
        $this->categoriaid = $categoriaid;
    }

    public function getCriadoEm(): string {
        return date('d/m/Y - H:i:s', strtotime($this->criadoem));
    }

    public function setCriadoEm(string $criadoem): void {
        $this->criadoem = $criadoem;
    }
}