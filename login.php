<?php
//captura token
$token = filter_input(INPUT_GET, 'login_token');

//inicia sessão do usuário
session_start();
$_SESSION['token'] = $token;

$message = filter_input(INPUT_GET, 'message', FILTER_SANITIZE_STRING);

if(isset($message)):
    $isMessage = true;
else:
    $isMessage = false;
endif;
?>
<!doctype html>
<html lang="pt-BR">
    <head>
        <link href="sweetalert/sweetalertss.css">
        <title>WATCH ESPN/NORTELINE</title>
        <meta charset="utf-8" />

        <link rel="apple-touch-icon" sizes="76x76" href="../image/apple-icon.png" />
        <link rel="icon" type="image/png" href="image/favicon.ico" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/material-kit.css" rel="stylesheet"/>

        <link href="sweetalert/sweetalert.css" rel="stylesheet" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

        <script>
            var CpfCnpjMaskBehavior = function (val) {
                return val.replace(/\D/g, '').length <= 11 ? '000.000.000-009' : '00.000.000/0000-00';
            },
                    cpfCnpjpOptions = {
                        onKeyPress: function (val, e, field, options) {
                            field.mask(CpfCnpjMaskBehavior.apply({}, arguments), options);
                        }
                    };

            $(function () {
                $(':input[name=login]').mask(CpfCnpjMaskBehavior, cpfCnpjpOptions);
            })
        </script>
    </head>

    <body class="signup-page">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"><b>WATCH ESPN / NORTE LINE</b></a>
                </div>
                <div class="collapse navbar-collapse" id="navigation-example">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="https://fb.com/nortelinetelecom" target="_blank" class="btn btn-simple btn-white btn-just-icon">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://instragam.com/nortelinetelecom" target="_blank" class="btn btn-simple btn-white btn-just-icon">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="wrapper">
            <div class="header header-filter" style="background-image: url('image/fundo31.jpg'); background-size: cover; background-position: top center;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                            <div class="col-md-12">
                            </div>
                            <div class="card card-signup">
                                <form class="form" action="autentica.php" method="POST">
                                    <div class="header header-info text-center">
                                        <h4>Área do Assinante</h4>
                                    </div>
                                    <p class="text-divider">
                                        <img src="image/icon.png" style="height: 40px">
                                    </p>
                                    <p class="text-divider">Fazer Login</p>
                                    <?php if($isMessage) { ?>
                                        <div class="alert alert-warning" role="alert">
                                            <?= $message ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php } ?>
                                    <div class="content">
                                        <div style="width: 160px; margin: 0 auto;">
                                            <div class="input-group">
                                                <input type="text" id="cpfcnpj" class="form-control" name="login" autocomplete="off" required="" placeholder="CPF">
                                            </div>
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="password" autocomplete="off"  required="" placeholder="Senha">
                                            </div>
                                            <!--<a name="open_new_window" data-type="forgotPassword" href="#"><font color="495796">› Esqueceu sua senha?</font></a>-->
                                        </div>
                                    </div>
                                    <div class="footer text-center">
                                        <button type="submit" class="btn btn-simple btn-info btn-lg">
                                            <font color="495796"><b>Fazer Login</b></font>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <!--   Core JS Files   -->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/material.min.js"></script>
    <script src="js/nouislider.min.js" type="text/javascript"></script>
    <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="js/material-kit.js" type="text/javascript"></script>
    <script src="sweetalert/sweetalert.min.js"></script>
</html>