<?php 
  require_once('config/config.php'); 
  $UsuarioService = new UsuarioService(); 
  $usuario = $UsuarioService->localizar($_GET['id']);
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
            <section class="page-section" id="usuarios">
              <div class="container">
                  <div class="text-center">
                      <h2 class="section-heading text-uppercase">Sistema de Edição de Usuários</h2>
                      <h3 class="section-subheading text-muted">Utilize a tabela abaixo para incluir as informações sobre os usuários.</h3>
                  </div>
                  <form id="usuariosForm" data-sb-form-api-token="API_TOKEN" method="POST" action="user.edit">
                      <div class="row align-items-center mb-5 offset-4">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="idIdentificador">Identificador</label>
                                  <input type="text" id="idIdentificador" name="inputIdentificador" class="form-control" value="<?= $usuario->getId() ?>" readonly/>
                              </div>
                              <div class="form-group">
                                  <!-- Nome input-->
                                  <input class="form-control" id="nome" name="inputNome" value="<?= $usuario->getNome() ?>" type="text" placeholder="Informe o nome *" data-sb-validations="required" />
                                  <div class="invalid-feedback" data-sb-feedback="nome:required">Informe o nome.</div>
                              </div>
                              <div class="form-group">
                                  <!-- Email input-->
                                  <input class="form-control"  id="email" name="inputEmail" value="<?= $usuario->getEmail() ?>" type="text" placeholder="Informe o email *" data-sb-validations="required" />
                                  <div class="invalid-feedback" data-sb-feedback="email:required">Informe o email.</div>
                              </div>
                              <div class="form-group mb-md-0">
                                  <!-- Senha input-->
                                  <input class="form-control" id="senha" name="inputSenha" value="<?= $usuario->getSenha() ?>" type="password" placeholder="Informe a senha *" data-sb-validations="required" />
                                  <div class="invalid-feedback" data-sb-feedback="senha:required">Informe a senha.</div>
                              </div>
                              <div class="form-group mb-md-0">
                                  <!-- Senha Repetida input-->
                                  <input class="form-control"  id="senha2" name="inputSenhaRepetida" value="<?= $usuario->getSenha() ?>" type="password" placeholder="Repita a senha *" data-sb-validations="required" />
                                  <div class="invalid-feedback" data-sb-feedback="senha2:required">Repita a senha.</div>
                              </div>
                          </div>
                      </div>
                      <!-- Submit Button-->
                      <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Alterar</button></div>
                  </form>
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
