<?php

    class BlogService {
        
        private $repository;

        public function __construct() {
            $this->repository = new BlogRepository();
        }

        public function cadastrar(Blog $blog): bool {
            return $this->repository->fnAddBlog($blog);
        }

        public function atualizar(Blog $blog): bool {
            return $this->repository->fnUpdateBlog($blog);
        }
        
        public function listar($limit) {
            return $this->repository->fnListBlogs($limit);
        }
        
        public function localizar($id) {
            return $this->repository->fnLocalizarBlogs($id);
        }

        public function deletar($id) {
            return $this->repository->fnDeletarBlog($id);
        }
    } 