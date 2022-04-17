<?php 
require_once('config/config.php');
$BlogService = new BlogService(); 
$categoriaService = new CategoriaService(); 
$ServicoService = new ServicoService(); 
$usuarioService = new UsuarioService(); 
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
                    <div class="card-header">
                    <h3 class="card-title"><strong>Modern</strong>|Business</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                        </button>
                    </div>
                    </div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                            <div class="row">
                                <div class="col-12">
                                    <h4>Últimas categorias adicionadas</h4>
                                    <?php foreach ($categoriaService->listarCategoria(10) as $categoria): ?>
                                        <div class="col-7">
                                        <h2 class="lead"><b><?= $categoria->getNome() ?></b></h2>
                                            <p class="text-muted text-sm"><b>Criada em: </b> <?= $categoria->getCriadoEm() ?> </p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                <h4>Últimos blogs adicionados</h4>
                                <?php foreach ($BlogService->listar(3) as $index => $blog): ?>
                                    <div class="post <?= ($index%2==0) ? 'clearfix' : '' ?>">
                                    <div class="user-block">
                                        <span>
                                        <a href="#"><strong><?= $blog->getTitulo() ?></strong></a>
                                        </span>
                                        <small class=""> - <?= $blog->getCriadoEm() ?></small>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                    <?= $blog->getDescricao() ?>
                                    </p>

                                    <p>
                                        <a href="servico.details?id=<?= $blog->getId() ?>" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Veja detalhes</a>
                                    </p>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                <h4>Últimos serviços adicionados</h4>
                                <?php foreach ($ServicoService->listar(3) as $index => $servico): ?>
                                    <div class="post <?= ($index%2==0) ? 'clearfix' : '' ?>">
                                    <div class="user-block">
                                        <span>
                                        <a href="#"><strong><?= $servico->getTitulo() ?></strong></a>
                                        </span>
                                        <small class=""> - <?= $servico->getCriadoEm() ?></small>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                    <?= $servico->getDescricao() ?>
                                    </p>

                                    <p>
                                        <a href="servico.details?id=<?= $servico->getId() ?>" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Veja detalhes</a>
                                    </p>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                <h4>Últimos usuários adicionados</h4>
                                    <?php foreach ($usuarioService->listar(10) as $usuario): ?>
                                        <div class="col-7">
                                        <h2 class="lead"><b><?= $usuario->getNome() ?></b></h2>
                                            <p class="text-muted text-sm"><b>Email: </b> <?= $usuario->getEmail() ?> </p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <h3 class="text-primary"><i class="fas fa-box-archive"></i> <strong>Modern</strong>|Business</h3>
                        <p class="text-muted">Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore.</p>
                        <br>
                        <div class="text-muted">
                            <p class="text-sm">Sistema
                            <b class="d-block"><strong>Modern</strong>|Bunisess</b>
                            </p>
                            <p class="text-sm">Desenvolvedor
                            <b class="d-block">Thalis Mateus Barcellos Macedo - Senac 2021.2</b>
                            </p>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

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
