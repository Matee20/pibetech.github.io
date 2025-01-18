<?php include_once("../../config/variablesGlobales.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/index.css">
  <link rel="stylesheet" href="../../Public/assets/css/formulario_de_compra.css">
  <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/carga.css">
  <title>Formulario de pagos</title>
</head>

<body>
  <?php include_once("efecto_carga.php"); ?>
  <div class="pay-form">
    <div class="name-form">
      <img src="../../Public/imagenes/LOGO.png" width="48px" height="48px">
      <h1>Informacion de pago</h1>
    </div>
    <form id="form-pago" class="form-pago">
      <div class="nombre">
        <p>Nombre completo</p>
        <input type="text" placeholder="Gabriela Rojas" autocomplete="off">
      </div>
      <div class="numero-tarjeta">
        <p>Numero de Tarjeta de Credito</p>
        <input type="text" placeholder="1234 1234 1234 1234" maxlength="16" autocomplete="off">
      </div>
      <div class="date-tarjeta">
        <div class="exp-form">
          <p>Fecha de vencimiento</p>
          <input type="text" placeholder="MM/YY" maxlength="4" autocomplete="off">
        </div>
        <div class="cvv-form">
          <p>CVV</p>
          <input type="text" placeholder="***" maxlength="3" autocomplete="off">
        </div>
      </div>
      <div class="direccion-tarjeta">
        <p>Direccion</p>
        <input type="text" placeholder="Av.Bolognesi #234" autocomplete="off">
      </div>
      <button> Confirmar pago</button>
    </form>
    <h6>Verificas que esta informacion es correcta</h6>
  </div>
  <script src="../../Public/assets/js/carga.js"></script>
</body>

</html>