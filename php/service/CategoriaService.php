<?php

    class CategoriaService {
        
        private $repository;

        public function __construct() {
            $this->repository = new SiteRepository();
        }

        public function cadastrar(Categoria $categoria): bool {
            return $this->repository->fnAddCategoria($categoria);
        }
        
        public function atualizar(Categoria $categoria): bool {
            return $this->repository->fnUpdateCategoria($categoria);
        }
        
        public function localizar($id) {
            return $this->repository->fnLocalizarCategoria($id);
        }
        
        public function listarCategoria($limit) {
            return $this->repository->fnListCategorias($limit);
        }
        
        public function LocalizarPorIds($ids) {
            return $this->repository->fnListCategoriasIn($ids);
        }

        public function listarComQuantidade($limit) {
            return $this->repository->fnListCategoriasQuantidade($limit);
        }
        
        public function deletar($id) {
            return $this->repository->fnDeletarCategoria($id);
        }
    } 