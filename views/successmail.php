<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include './partials/head.php';?>
</head>
<body class="bg-success">
<script>
    window.onload = function() {
        
        swal({
            title: "Beleza, deu certo!",
            text: "A gente conseguiu te enviar o e-mail :)",
            icon: "success",
            buttons: "Ótimo, e agora?",
        }).then((value) => {
            swal({
                title: "Agora é com você!",
                text: "Quer acessar o seu e-mail agora?",
                icon: "info",
                buttons: ["Não, depois eu olho","Sim, me leva pra lá"],
            }).then((sim) => {
                if (sim){
                    window.location.href='https://mail.fccr.sp.gov.br';
                }else{
                    javascript:history.back();
                }
            });
        });
            
    }
    </script>
</body>
<?php include './partials/scripts.php';?>
</html>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                