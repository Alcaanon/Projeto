<?php 
  require_once('config/config.php');
  $categoriaService = new CategoriaService(); 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Modern Business - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            
            <?php 
            require("./homenav.php");
            ?>
            <!-- Header-->
            <header class="bg-dark py-5">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <section class="content">
                <div class="card">
                <div class="card-body row">
                    <div class="col-5 text-center d-flex align-items-center justify-content-center">
                        <div class="">
                            <h2>Modern<strong>|Business</strong></h2>
                            <p class="lead mb-5">Cadastre um servico</p>
                        </div>
                    </div>
                    <div class="col-7">
                        <form id="servicoform" action="servico.register" method="post">
                            <div class="form-group">
                                <label for="idClasse">Nome da classe</label>
                                <input type="text" id="idClasse" name="inputClasse" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="titulo">Titulo do serviço</label>
                                <input type="text" step="any" id="titulo" name="inputTitulo" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="descricao">Descrição do serviço</label>
                                <input type="text" step="any" id="descricao" name="inputDescricao"  class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="CategoriaId">Categoria</label>
                                <select id="CategoriaId" name="inputCategoria" class="form-control custom-select">
                                <option selected disabled>Selecione</option>
                                <?php foreach($categoriaService->listarCategoria($limit) as $categoria): ?>
                                
                                <option value="<?= $categoria->getId()?>"><?= $categoria->getNome()?></option>
                                <?php endforeach; ?>
                                </select> 
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark">Cadastrar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                            </div>
                        </div>
                    </div>
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2022</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
