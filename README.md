Probado con:
    php 8.0.3
    node 14.16.0
    npm 7.7.5

Ejecutar comando:
    composer install

Crear el archivo '.env'
Copiar el contenido del archivo '.env.example' en el archivo anteriormente creado

Indicar la URL del proyecto en la propiedad 'APP_URL'

Ejecutar el siguiente comando para generar una key en el proyecto:
    php artisan key:generate --ansi

Ejecutar el siguiente comando para reiniciar la configuracion de laravel:
    php artisan config:clear

Ejecutar los siguientes comandos para crear la autenticacion:
    php artisan breeze:install
    sudo npm install && npm run dev

Crear la base de datos llamada, en nuestro caso, 'laravel_echo_socket_io' y ejecutar el siguiente comando:
    php artisan optimize
    php artisan migrate

Registrar usuarios en la URL '/register'

Esto nos redirigá a la URL '/dashboard' si quiere registrar otro usuario, desloguear y dirigirse a la pantalla '/register' nuevamente

Instalar laravel echo de manera global con el siguiente comando:
    sudo npm install -g laravel-echo-server

