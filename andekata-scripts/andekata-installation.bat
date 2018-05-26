TITLE Ajaro Andekata Installation
ECHO OFF
CLS
ECHO -by Ajaro 2018

REM --- check requirements... ---
ECHO check internet connection
PING www.google.nl -n 1 -w 1000
IF ERRORLEVEL 1 EXIT /b ERRORLEVEL
ECHO check 7zip
tools\7z\7za.exe --help
ECHO check curl 
tools\curl\bin\curl.exe --version

REM tools
SET SZ=tools\7z\7za.exe
SET CURL=tools\curl\bin\curl.exe

REM module file
SET NEARD_APACHE_FILE=neard-apache-2.4.29-r7.7z
SET NEARD_ADMINER_FILE=neard-adminer-4.3.1-r7.7z
SET NEARD_PHP_FILE=neard-php-7.1.12-r23.7z
SET NEARD_NODEJS_FILE=neard-nodejs-8.9.3-r19.7z
SET NEARD_POSTGRESQL_FILE=neard-postgresql-9.6.3-r3.7z
SET NEARD_COMPOSER_FILE=neard-composer-1.5.6-r7.7z
SET NEARD_CONSOLE_FILE=neard-console-2.00.148.4-r5.7z
SET NEARD_GHOSTSCRIPT_FILE=neard-ghostscript-9.22-r3.7z
SET NEARD_GIT_FILE=neard-git-2.15.1.2-r11.7z

REM extract module
CALL %SZ% x tmp\%NEARD_APACHE_FILE% -aoa -obin\apache
CALL %SZ% x tmp\%NEARD_ADMINER_FILE% -aoa -oapps\adminer
CALL %SZ% x tmp\%NEARD_PHP_FILE% -aoa -obin\php
CALL %SZ% x tmp\%NEARD_NODEJS_FILE% -aoa -obin\nodejs
CALL %SZ% x tmp\%NEARD_POSTGRESQL_FILE% -aoa -obin\postgresql
CALL %SZ% x tmp\%NEARD_COMPOSER_FILE% -aoa -otools\composer
CALL %SZ% x tmp\%NEARD_CONSOLE_FILE% -aoa -otools\console
CALL %SZ% x tmp\%NEARD_GHOSTSCRIPT_FILE% -aoa -otools\ghostscript
CALL %SZ% x tmp\%NEARD_GIT_FILE% -aoa -otools\git

REM register redis-server to system using nssm
CALL core\libs\nssm\nssm.exe install andekataredis "%~dp0bin\redis\redis2.4.6\redis-server.exe"
CALL core\libs\nssm\nssm.exe start andekataredis

REM add andekata hosts
127.0.0.1 api.andekata.app >> tmp\andekata-hosts.txt
127.0.0.1 andekata.app >> tmp\andekata-hosts.txt
CALL core\libs\hostseditor\HostsEditor.exe /i tmp\andekata-hosts.txt

REM remove temp file
CALL @RD tmp
CALL @MD tmp
