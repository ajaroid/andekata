TITLE Ajaro Andekata Client Setup
ECHO OFF
CLS
ECHO -by Ajaro 2018

REM --- check requirements... ---
REM ECHO check internet connection
REM PING www.google.nl -n 1 -w 1000
REM IF ERRORLEVEL 1 EXIT /b ERRORLEVEL
REM ECHO check git 
REM git --version
REM ECHO check node
REM node --version
REM ECHO check npm
REM CALL npm --version

REM --- cd andekata-api
CD andekata-api
git pull origin master

REM setup
CALL composer install
CALL composer setup