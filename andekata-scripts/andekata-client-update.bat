TITLE Ajaro Andekata Client Setup
ECHO OFF
CLS
ECHO -by Ajaro 2018

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