TITLE Ajaro Andekata Client Setup
ECHO OFF
CLS
ECHO -by Ajaro 2018

REM --- clone andekata-client to local
ECHO clone andekata-client to local
git clone https://github.com/ajaroid/andekata-client.git
CD andekata-client
git pull origin master

REM --- setting environment... ---
ECHO setting environment
COPY .env.example .env
@ECHO REACT_APP_BASE_API_URL=http://andekata.api > .env

REM --- install dependencies & build client... ---
CALL npm install
CALL npm run build
COPY .htaccess build\.htaccess

REM setup virtual host