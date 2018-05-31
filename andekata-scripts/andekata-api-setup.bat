TITLE Ajaro Andekata API Setup
ECHO OFF
CLS
ECHO -by Ajaro 2018

REM --- clone andekata-api to local
ECHO clone andekata-api to local
git clone https://github.com/ajaroid/andekata-api.git
CD andekata-api
git pull origin master

REM --- setup... ---
CALL %~dp0..\bin\mariadb\mariadb10.2.7\bin\mysql.exe -uroot -e "CREATE DATABASE IF NOT EXISTS ajaro_andekata"

CALL COPY .env.example .env

SET PHPWIN=%~dp0..\core\libs\php\php.exe
SET ENVEDIT=%~dp0..\andekata-scripts\env-edit.php

CALL %PHPWIN% %ENVEDIT% DB_CONNECTION mysql
CALL %PHPWIN% %ENVEDIT% DB_HOST 127.0.0.1
CALL %PHPWIN% %ENVEDIT% DB_PORT 3307
CALL %PHPWIN% %ENVEDIT% DB_DATABASE ajaro_andekata
CALL %PHPWIN% %ENVEDIT% DB_USERNAME root
CALL %PHPWIN% %ENVEDIT% DB_PASSWORD  
CALL %PHPWIN% %ENVEDIT% QUEUE_DRIVER redis
CALL %PHPWIN% %ENVEDIT% CACHE_DRIVER redis

CALL composer install
CALL composer setup
CALL composer new-migration-seed

REM TODO HERE
REM ganti koneksi DB .env
REM ganti queue driver  .env
REM ganti cache driver .env
REM jalankan php artisan storage:link
REM jalankan migration 