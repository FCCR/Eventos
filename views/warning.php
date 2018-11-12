<?php 
require '../mailer/PHPMailerAutoload.php';

$url = $_SERVER['REQUEST_URI'];
$parteurl = explode('?', $url);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include './partials/head.php';?>
</head>
<body class="bg-white">
    <?php if($_GET['error'] == 1): ?>
    <script>
        window.onload = function() {
        
            swal({
                title: "Opa! Você encontrou um erro!",
                text: "Parece que a gente ja tem uma imagem com esse nome :(",
                icon: "error",
                buttons: "Ai meu Deus, o que eu faço?",
            }).then((value) => {
                swal({
                    title: "É facil!",
                    text: "Se você tiver certeza de que não é a mesma imagem, mude o nome dela e tente enviar de novo.",
                    icon: "success",
                    buttons: "Voltar",
                }).then((value) => {
                    javascript:history.back();
            });
        });
            
    }
    </script>
    <?php endif; ?>
    <?php if($_GET['error'] == 2): ?>
    <script>
        window.onload = function() {
        
            swal({
                title: "Opa! Você encontrou um erro!",
                text: "Parece que o arquivo que você enviou não é uma imagem.",
                icon: "error",
                buttons: "E agora, o que eu faço?",
            }).then((value) => {
                swal({
                    title: "Verifique",
                    text: "Veja se o final do nome da sua imagem é: .jpg, .jpeg, .png; se não for, infelizmente você não poderá subir esse arquivo no sistema.",
                    icon: "info",
                    buttons: "Voltar",
                }).then((value) => {
                    javascript:history.back();
            });
        });
            
    }
    </script>
    <?php endif; ?>
    <?php if($_GET['error'] == 3): ?>
    <script>
        window.onload = function() {
        
            swal({
                title: "Opa! Você encontrou um erro!",
                text: "Essa imagem é muito grande :(",
                icon: "error",
                buttons: "E agora, o que eu faço?",
            }).then((value) => {
                swal({
                    title: "Diminua o tamanho",
                    text: "Existem algumas ferramentas online que diminuem o tamanho das fotos. Procure alguma de sua preferencia e diminua o tamanho da imagem, depois, é só tentar de novo!",
                    icon: "info",
                    buttons: "Voltar",
                }).then((value) => {
                    javascript:history.back();
            });
        });
            
    }
    </script>
    <?php endif; ?>
    <?php if($_GET['success'] == 1): ?>
    <script>
        window.onload = function() {
        
            swal({
                title: "A imagem foi enviada!",
                text: "A gente já recebeu a sua imagem e adicionamos ela no evento.",
                icon: "success",
                buttons: "Ok",
            }).then((value) => {
                    javascript:history.back();
            });
            
        }
    </script>
    <?php endif; ?>
</body>
<?php include './partials/scripts.php';?>
</html>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                