Probado con:
    php 8.0.3
    node v14.16.0
    npm 7.7.5

Ejecutar comando:
    composer install

Crear el archivo '.env'
Copiar el contenido del archivo '.env.example' en el archivo anteriormente creado

Ejecutar el siguiente comando para generar una key en el proyecto:
    php artisan key:generate --ansi

Ejecutar el siguiente comando para reiniciar la configuracion de laravel:
    php artisan config:clear

Ejecutar los siguientes comandos para crear la autenticacion:
    php artisan breeze:install
    npm install && npm run dev

Crear la base de datos 
    php artisan migrate

