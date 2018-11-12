<?php 
    session_start(); 
    if(!$_SESSION['logged']) header('Location: ./index.php');

    include_once("./../src/controllers/variables.php");
    include_once("./../src/controllers/pegarusuario.php");
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
            title: "Você tem certeza?",
            text: "O usuário será excluído e não vai mais poder fazer nada!",
            icon: "warning",
            buttons: ["Eu não quero fazer isso", "Sim, pode mandar pro limbo!"],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Puf! O usuário foi excluído :)", {
                    icon: "success",
                })
                    .then((value) => {
                        document.getElementById('delete-event-form').submit();
                    }); 
                } else {
                    swal("O usuário está a salvo, ufa! :)")
                    .then((value) => {
                        window.location.href='/views/users.php'
                    });   
                }
        });

    }
    </script>
<div class="hidden d-none">
    <form class="w-80 mx-auto" id="delete-event-form" action="../src/controllers/desativarusuario.php" method="POST">
        <div class="form-group">
                <div class="form-check form-check-inline mt-3">
                    <input class="form-check-input" type="hidden" name="situacao" value="0" /> <input class="custom-control-input form-check-input" type="checkbox" name="situacao" id="checkbox" value="1" checked>
                </div>
                <div class="button mt-5">
                    <button type="submit" class=" btn btn-danger">Sim, eu tenho certeza</button>
                </div>
        </div>
    </form>
</div>
 
</body>
    <?php include './partials/scripts.php';?>
</html>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                