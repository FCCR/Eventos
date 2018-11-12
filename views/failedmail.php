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
<script>
    window.onload = function() {
        
        swal({
            title: "Opa! Você encontrou um erro!",
            text: "O que aconteceu: <? echo rawurldecode($parteurl[1]); ?>",
            icon: "error",
            buttons: "Ai meu Deus, o que eu faço?",
        }).then((value) => {
            swal({
                title: "Pode ficar tranquilão",
                text: "Relaxa, um relatório desse erro foi enviado para a administração e a gente já está trabalhando pra resolver esse problema.",
                icon: "success",
                buttons: "Voltar",
            }).then((value) => {
                javascript:history.back();
            });
        });
            
    }
    </script>
</body>
<?php include './partials/scripts.php';?>
</html>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                