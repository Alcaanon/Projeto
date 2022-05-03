<?php 
  require_once('config/config.php');
  $CategoriaService = new CategoriaService(); 
  
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
            <?php 
            require("./homenav.php");
            ?>
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
                <div class="card card-solid">
                    <div class="card-body pb-0">
                        <div class="text-right">
                            <a href="blog.form" class="btn btn-link">
                            <i class="fas fa-plus-circle"></i> Adicionar
                            </a>
                        </div>
                        <div class="row">
                        <?php foreach ($CategoriaService->listarCategoria(10) as $index => $categoria): ?>
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                            Categoria
                            </div>
                            <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                <h2 class="lead"><b><?= $categoria->getNome() ?></b></h2>
                                <p class="text-muted text-sm"><b>Criada em: </b> <?= $categoria->getCriadoEm() ?> </p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                </ul>
                                </div>
                            </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                <a href="categoria.details?id=<?= $categoria->getId() ?>" class="btn btn-sm btn-primary">
                                    <i class="fas fa-box"></i> Editar</a>&nbsp;
                                <a onclick="return confirm('Deseja realmente remover este item?')" href="categoria.delete?id=<?= $categoria->getId() ?>" class="btn btn-sm btn-primary">
                                    <i class="fas fa-box"></i> Deletar</a>
                                </a>
                                </div>
                            </div>
                        </div>
                        </div>
                        <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <nav aria-label="Contacts Page Navigation">
                        <ul class="pagination justify-content-center m-0">
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                        </ul>
                        </nav>
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
