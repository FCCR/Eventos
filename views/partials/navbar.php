<nav class="navbar navbar-expand-lg navbar-light navbar-bg">
    <a class="navbar-brand" href="http://fccr.sp.gov.br" target="_blank">
       <img src="../img/fccr_horizontal.png" width="150">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav mr-auto justify-content-center">
            <li class="nav-item active">
                <a class="nav-link" href="./../views/index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./../views/eventos.php">Eventos </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./../views/checkins.php">Meus Eventos</a>
            </li>
            
            <? if($_SESSION['admin'] == 1): ?>

            <li class="nav-item">
                <a class="nav-link" href="./../views/users.php">Gerenciar Usuários</a>
            </li> 

            <? endif; ?>
        </ul>
        <div class="profile form-inline color-green">
            <div class="dropdown">
                <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <?php echo $name . " " . $lastname;?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <h6 class="dropdown-header">Perfil</h6>
                    <a class="dropdown-item" href="./../views/checkins.php">Meus Eventos</a>
                    <a class="dropdown-item" href="./../views/config.php">Alterar Cadastro</a>
                    <a class="dropdown-item" href="./../src/controllers/logout.php">Sair</a>
                </div>
            </div>

            <?php if($_SESSION['sexo'] == 'm'): ?> 
                <img src="../assets/images/avatar_m.png" class="ml-1"> 
            <?php else: ?>
                <img src="../assets/images/avatar_f.png" class="ml-1">
            <?php endif; ?>      
        </div>
    </div>
</nav>
