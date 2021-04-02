Probado con:
    ubuntu 20.04
    php 8.0.3
    node 14.16.0
    npm 7.7.5
    redis 6.2.1

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

Para ejecutar redis hay 2 maneras (que yo conozco), dentro de la carpeta '/redis' encontraran el archivo 'redis-6.2.1.tar.gz'
Descomprimirlo con el siguiente comando:
    $ tar xzf redis-6.2.1.tar.gz

Entrar al directorio:
    $ cd redis-6.2.1

Ejecutar lo siguiente:
    $ make

Para levantar el servicio ejecutar:
    src/redis-server

Nos aparecera en la consola algo como lo siguiente:
    318699:C 01 Apr 2021 21:10:23.090 # oO0OoO0OoO0Oo Redis is starting oO0OoO0OoO0Oo
    318699:C 01 Apr 2021 21:10:23.090 # Redis version=6.2.1, bits=64, commit=00000000, modified=0, pid=318699, just started
    318699:C 01 Apr 2021 21:10:23.090 # Warning: no config file specified, using the default config. In order to specify a config file use src/redis-server /path/to/redis.conf
    318699:M 01 Apr 2021 21:10:23.092 * Increased maximum number of open files to 10032 (it was originally set to 1024).
    318699:M 01 Apr 2021 21:10:23.092 * monotonic clock: POSIX clock_gettime
                    _._                                                  
            _.-``__ ''-._                                             
        _.-``    `.  `_.  ''-._           Redis 6.2.1 (00000000/0) 64 bit
    .-`` .-```.  ```\/    _.,_ ''-._                                   
    (    '      ,       .-`  | `,    )     Running in standalone mode
    |`-._`-...-` __...-.``-._|'` _.-'|     Port: 6379
    |    `-._   `._    /     _.-'    |     PID: 318699
    `-._    `-._  `-./  _.-'    _.-'                                   
    |`-._`-._    `-.__.-'    _.-'_.-'|                                  
    |    `-._`-._        _.-'_.-'    |           http://redis.io        
    `-._    `-._`-.__.-'_.-'    _.-'                                   
    |`-._`-._    `-.__.-'    _.-'_.-'|                                  
    |    `-._`-._        _.-'_.-'    |                                  
    `-._    `-._`-.__.-'_.-'    _.-'                                   
        `-._    `-.__.-'    _.-'                                       
            `-._        _.-'                                           
                `-.__.-'                                               

    318699:M 01 Apr 2021 21:10:23.094 # Server initialized
    318699:M 01 Apr 2021 21:10:23.094 # WARNING overcommit_memory is set to 0! Background save may fail under low memory condition. To fix this issue add 'vm.overcommit_memory = 1' to /etc/sysctl.conf and then reboot or run the command 'sysctl vm.overcommit_memory=1' for this to take effect.
    318699:M 01 Apr 2021 21:10:23.094 * Loading RDB produced by version 6.2.1
    318699:M 01 Apr 2021 21:10:23.094 * RDB age 2 seconds
    318699:M 01 Apr 2021 21:10:23.094 * RDB memory usage when created 0.85 Mb
    318699:M 01 Apr 2021 21:10:23.094 * DB loaded from disk: 0.000 seconds
    318699:M 01 Apr 2021 21:10:23.095 * Ready to accept connections
    318699:M 01 Apr 2021 21:37:49.737 * 100 changes in 300 seconds. Saving...
    318699:M 01 Apr 2021 21:37:49.737 * Background saving started by pid 321356
    321356:C 01 Apr 2021 21:37:49.739 * DB saved on disk
    321356:C 01 Apr 2021 21:37:49.739 * RDB: 0 MB of memory used by copy-on-write
    318699:M 01 Apr 2021 21:37:49.838 * Background saving terminated with success


Si genera algun error solo debe buscar liberar el puerto o cambiarlo en la configuracion.

Puede interactuar con Redis utilizando el cliente integrado:
    $ src/redis-cli
    redis> set foo bar
    OK
    redis> get foo
    "bar"


Del PPA oficial de Ubuntu
    Puede instalar la última versión estable de Redis desde el repositorio de paquetes redislabs / redis. Agregue el repositorio al índice de apt, actualícelo e instale:
        $ sudo add-apt-repository ppa:redislabs/redis
        $ sudo apt-get update
        $ sudo apt-get install redis

    Esto deberia de levantar un servicio de redis automaticamente

Para ejecutar el proyecto debemos ejecutar levantar 2 consolas:
    1 - iniciar el servicio conectando con redis:
        laravel-echo-server start

            L A R A V E L  E C H O  S E R V E R

            version 1.6.2

            ⚠ Starting server in DEV mode...

            ✔  Running at laravel-echo-socket.io.prueba on port 6001
            ✔  Channels are ready.
            ✔  Listening for http events...
            ✔  Listening for redis events...

            Server ready!

    2 - ejecutar las tareas que escuchen los eventos:
        php artisan queue:work

Si todo esta bien deberiamos poder entrar al '/dashboard' (despues de haber logueado) y la consola del 'laravel-echo-server start' mostrarnos algo como lo siguiente:

    [22:44:41] - Preparing authentication request to: http://laravel-echo-socket.io.prueba
    [22:44:41] - Sending auth request to: http://laravel-echo-socket.io.prueba/broadcasting/auth

    [22:44:41] - kCC93TWjuNwQ-0BJAAAA joined channel: message-channel
    [22:44:41] - kCC93TWjuNwQ-0BJAAAA authenticated for: private-user.1
    [22:44:41] - kCC93TWjuNwQ-0BJAAAA joined channel: private-user.1

Abrir 2 pestañas mas:
    Una en '/public-message' nos mostrara un msj como lo siguiente:
        'Mensaje publico'
    Esto enviara el siguiente msj al dashboard:
        'Esta notificación es un mensaje público'
    En la console de 'laravel-echo-server start' mostrarnos algo como lo siguiente:
        Channel: message-channel
        Event: MessageEvent
    Y en la consola de 'queue:work' algo como lo siguiente:
        [2021-04-02 03:47:23][GZajvUq38ZJWKo4ktGNyTo4diJ08fLIo] Processing: App\Events\PublicMessage
        [2021-04-02 03:47:23][GZajvUq38ZJWKo4ktGNyTo4diJ08fLIo] Processed:  App\Events\PublicMessage

    Y otra en '/user-channel' nos mostrara un msj como lo siguiente:
        'Mensaje privado al usuario ' concatenado del correo del usuario logueado
    Esto enviara el siguiente msj al dashboard:
        'Mensaje privado al correo '
        Como por ejemplo:  'Mensaje privado al correo pacg1991@gmail.com'
    En la console de 'laravel-echo-server start' mostrarnos algo como lo siguiente:
        Channel: private-user.1
        Event: UserEvent
    Y en la consola de 'queue:work' algo como lo siguiente:
        [2021-04-02 03:55:41][ZZgYeThntydfO5hbVgtcLzAVvLg74CiW] Processing: App\Events\UserEvent
        [2021-04-02 03:55:41][ZZgYeThntydfO5hbVgtcLzAVvLg74CiW] Processed:  App\Events\UserEvent

        