<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <div class="container-fluid">
        <!--Formulário de busca de Módulos, telas, funcoes ou itens-->
        <form class="d-flex">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar" 
                       aria-describedby="button-search">
                <div class="input-group-append">
                    <button class="btn btn-danger" type="button" id="button-search"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icons-nav far fa-bell"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <h6 class="dropdown-header">Notificações</h6>
                </div>
            </li>
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icons-nav fas fa-th"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <Div class="container">                    
                        <div class="row">
                            <div class="col">
                                A1
                            </div>
                            <div class="col">
                                B1
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                A2
                            </div>
                            <div class="col">
                                B2
                            </div>
                        </div>
                    </Div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icons-nav fas fa-cog"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <div class="dropdown-divider"></div>
                </div>
            </li>
           

            <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="account-user-avatar"> 
                        <img src="https://app.otraderquemultiplica.com.br/admin/biblioteca/b8b6b77494aacc7de8bf1725b5445edd" alt="user-image" class="rounded-circle">
                    </span>
                    <span>
                        <span class="account-user-name"><?= USER_NAME ?></span>
                        <span class="account-position"><?= USER_MAIL ?></span>
                    </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Meu perfil</a>
                    <a class="dropdown-item" href="#">Ajustes</a>
                    <a class="dropdown-item" href="#">Suporte</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Sair</a>
                </div>
            </li>
            
        </ul>

    </div>
</nav>
