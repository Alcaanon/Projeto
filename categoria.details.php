<?php 
  require_once('config/config.php'); 

  
  $categoriaService = new CategoriaService(); 
  $categoria = $categoriaService->localizar($_GET['id']);

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
           <!-- Main content -->
            <section class="content">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-5 text-center d-flex align-items-center justify-content-center">
                            <div class="">
                                <h2>Modern<strong>|Business</strong></h2>
                                <p class="lead mb-5">Detalhes da categoria</p>
                            </div>
                        </div>
                        <div class="col-7">
                            <form action="categoria.edit" method="post">
                                <div class="form-group">
                                    <label for="idIdentificador">Identificador</label>
                                    <input type="text" id="idIdentificador" name="inputIdentificador" class="form-control" value="<?= $categoria->getId() ?>" readonly/>
                                </div>
                                <div class="form-group">
                                    <label for="idNome">Nome</label>
                                    <input type="text" id="idNome" name="inputNome" class="form-control" value="<?= $categoria->getNome() ?>" />
                                </div>
                                <div class="col-12">
                                    &nbsp;&nbsp;&nbsp;<a href="categorias" class="btn btn-secondary mb-3" onclick="return confirm('Deseja descartar as alterações?')">Cancel</a>&nbsp;
                                    <button type="submit" class="btn btn-success mb-3">Salvar alterações</button>
                                </div>
                            </form>
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
