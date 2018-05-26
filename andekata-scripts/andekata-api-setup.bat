TITLE Ajaro Andekata API Setup
ECHO OFF
CLS
ECHO -by Ajaro 2018

REM --- check requirements... ---
REM ECHO check internet connection
REM PING www.google.nl -n 1 -w 1000
REM IF ERRORLEVEL 1 EXIT /b ERRORLEVEL
REM ECHO check git 
REM git --version
REM ECHO check PHP
REM php --version
REM ECHO check composer
REM CALL composer --version

REM --- clone andekata-api to local
ECHO clone andekata-api to local
git clone https://github.com/ajaroid/andekata-api.git
CD andekata-api
git pull origin master

REM --- setup... ---
CALL composer install
CALL composer setup
REM TODO HERE
REM ganti koneksi DB .env
REM ganti queue driver  .env
REM ganti cache driver .env
REM jalankan php artisan storage:link
REM jalankan migration 