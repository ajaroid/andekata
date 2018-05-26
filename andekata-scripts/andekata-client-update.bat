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

REM --- clone andekata-client to local
CD andekata-client
git pull origin master

REM --- setting environment... ---
@RD .env
ECHO setting environment
COPY .env.example .env
@ECHO REACT_APP_BASE_API_URL=http://api.simdes.ajaro.id > .env

REM --- install dependencies & build client... ---
@RD /S /Q build
@RD /S /Q node_modules
CALL npm install
CALL npm run build
COPY .htaccess build\.htaccess