<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <p><strong>Nombre:</strong> {!! $nombre !!} {!! $apellido !!}</p>
        <p><strong>Teléfono:</strong> {!! $telefono !!}</p>
        <p><strong>Email:</strong> <a href="mailto:{!! $email !!}">{!! $email !!}</a></p>
        <hr/>
        <p><strong>Mensaje:</strong> {!! $mensaje !!}</p>
    </body>
</html>