TITLE Ajaro Andekata API Setup
ECHO OFF
CLS
ECHO -by Ajaro 2018

REM --- check requirements... ---
ECHO check internet connection
PING www.google.nl -n 1 -w 1000
IF ERRORLEVEL 1 EXIT /b ERRORLEVEL
ECHO check git 
git --version
ECHO check PHP
php --version
ECHO check composer
CALL composer --version

REM --- clone andekata-api to local
ECHO clone andekata-api to local
git clone https://github.com/ajaroid/andekata-api.git
CD andekata-api
git pull origin master

REM --- setup... ---
CALL composer install
CALL composer setup
REM TODO HERE