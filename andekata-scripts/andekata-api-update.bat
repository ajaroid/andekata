TITLE Ajaro Andekata Client Setup
ECHO OFF
CLS
ECHO -by Ajaro 2018

REM --- cd andekata-api
CD andekata-api
git pull origin master

REM setup
CALL composer install
CALL composer setup