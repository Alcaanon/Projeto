<?php

    class ServicoService {
        
        private $repository;

        public function __construct() {
            $this->repository = new ServicosRepository();
        }

        public function cadastrar(Servico $servico): bool {
            return $this->repository->fnAddServico($servico);
        }
        
        public function listar($limit) {
            return $this->repository->fnListServicos($limit);
        }
        
        public function localizar($id) {
            return $this->repository->fnLocalizarServicos($id);
        }
    } 