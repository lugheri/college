<!doctype html>

<html lang="pt-br">
    <head>
        <!--Required meta tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--Bootstrap CSS -->
        <link rel="stylesheet" href="<?= PUBLIC_PATH?>css/bootstrap.min.css">

        <!--Estilo CSS-->
        <link rel="stylesheet" href="<?= PUBLIC_PATH?>css/style-login.css?nocache=<?= NOCACHE?>">


        <!--Google Fonts-->
        <link rel="preconnect" href="https://fonts.gstatuc.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;700;900&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">

        <!--Favicon-->
        <link rel="icon" href="<?= PUBLIC_PATH?>img/ico_32.png" sizes="32x32">
        <link rel="icon" href="<?= PUBLIC_PATH?>img/ico.png" sizes="192x192">

        <title>TRADE X ADM | Autenticação</title>


    </head>
    <body>
        <div class="info-side">            
            <div class="side-brand">
                <img src="<?= PUBLIC_PATH?>img/comunidade_branco.png" style="width:80%"/>
            </div>
            <div class="side-text">
                <p>Acesse a área administrativa da plataforma com seu login e senha.</p>
            </div>
        </div>
        <div class="box-center">
            <div class="box-auth">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <i class="icon fas fa-lock"></i>
                        </div>                        
                    </div>
                    <form method="post" action="">                        
                        <div class="row">
                            <div class="col">
                                <input type="text" 
                                    name="username" 
                                    id="username"
                                    required 
                                    class="form-control form-control-lg"
                                    placeholder="Usuário"/>
                            </div>                        
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col">
                                <input type="password" 
                                    name="pass" 
                                    id="pass"
                                    required 
                                    class="form-control form-control-lg"
                                    placeholder="Senha"/>
                            </div>                        
                        </div>
                       
                        <br/>
                        <div class="row">
                            <div class="col-10 offset-1">
                                <button type="submit" class="btn btn-danger btn-block btn-lg">
                                    Autenticar
                                </button> 
                            </div>
                        </div>
                    </form>
                    <?php if($error):?>                        
                            <p class="alert-error"><i class="fas fa-exclamation"></i> Usuário e/ou Senha inválido(s)!</p>   
                            <?= $error ?>
                        <?php endif;?>
                    <br/>
                    <div class="row">
                        <div class="col-10 offset-1">
                           <a href="">Esqueceu a senha?</a>
                        </div>
                    </div>
                </div>
                
            </div>   
            <div class="box-footer">
                <div class="footer-links">
                    <a href="#">Suporte</a>
                    <a href="#">Termos de uso</a>
                    <a href="#">Política de Privacidade</a>  
                </div>
                
            </div>        
        </div>

        <!--Fontawesome-->
        <script src="https://kit.fontawesome.com/9423876485.js" crossorigin="anonymous"></script>
      
        
        <!-- Jquery first, then Popper.js, then Bootstrap JS-->
        <script src="<?= PUBLIC_PATH?>js/jquery-3.4.1.min.js"></script>
        <script src="<?= PUBLIC_PATH?>js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">let RAIZ = "<?= BASE_URL?>";</script>
        <script src="<?= PUBLIC_PATH?>js/scripts.js?nocache=<?= NOCACHE?>"></script>

    </body>
</html>



