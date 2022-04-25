<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Registro completo</title>
</head>
<body>
    <p>¡Enhorabuena! Estás a un paso de finalizar tu registro en Butore Store.</p>
    <p>Estos son los datos de tu registro:</p>

    <ul>
        <li>Nombre: {{ $usuario->Nombre }}</li>
        <li>Email: {{ $usuario->Direccion_envio }}</li>
    </ul>

    <p>Si los datos son correctos, puedes presionar en el siguiente enlace para finalizar tu registro:</p>
    <div>
        <a class="btn btn-primary" href="#" role="button">
            Confirmar registro
        </a>
    </div>
    <p>Si ha recibido este correo por error, póngase en contacto con el adminsitrador de la página.</p>
</body>
</html>