<?php

    class Servico {
        
        private int $id;
        private string $classe;
        private string $titulo;
        private string $descricao;
        private int $categoriaid;
        private string $criadoem;

        public function getId(): int {
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

        public function getCategoriaId(): int {
            return $this->categoriaid;
        }
    
        public function setCategoriaId($categoriaid): void {
            $this->categoriaid = $categoriaid;
        }

        public function getCriadoEm(): string {
            return date('d/m/Y - H:i:s', strtotime($this->criadoem));
        }

        public function setCriadoEm(string $criadoem): void {
            $this->criadoem = $criadoem;
        }
    }