<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../assets/bootstrap/bootstrap.min.css">
    <script src="../../assets/bootstrap/bootstrap.min.js"></script>
    <script src="../../assets/sweetalert/sweetalert.js"></script>
  <head>
  <body>
    <script language="JavaScript">
      function opa(){
        swal("Seus dados estão inválidos", "Tente novamente.", "error")
        .then((value) => {
          javascript:history.back();
        });
      }
    </script>
    <?php 
      echo "<script>opa();</script>";
    ?>
  </body>    
</html>