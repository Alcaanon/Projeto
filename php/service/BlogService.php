<?php

    class BlogService {
        
        private $repository;

        public function __construct() {
            $this->repository = new BlogRepository();
        }

        public function cadastrar(Blog $blog): bool {
            return $this->repository->fnAddBlog($blog);
        }
        
        public function listar($limit) {
            return $this->repository->fnListBlogs($limit);
        }
        
        public function localizar($id) {
            return $this->repository->fnLocalizarBlogs($id);
        }
    } 