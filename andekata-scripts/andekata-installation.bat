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

REM module file url
SET NEARD_APACHE_URL=https://github.com/neard/module-apache/releases/download/r7/%NEARD_APACHE_FILE%
SET NEARD_ADMINER_URL=https://github.com/neard/module-adminer/releases/download/r7/%NEARD_ADMINER_FILE%
SET NEARD_PHP_URL=https://github.com/neard/module-php/releases/download/r23/%NEARD_PHP_FILE%
SET NEARD_NODEJS_URL=https://github.com/neard/module-nodejs/releases/download/r19/%NEARD_NODEJS_FILE%
SET NEARD_POSTGRESQL_URL=https://github.com/neard/module-postgresql/releases/download/r3/%NEARD_POSTGRESQL_FILE%
SET NEARD_COMPOSER_URL=https://github.com/neard/module-composer/releases/download/r7/%NEARD_COMPOSER_FILE%
SET NEARD_CONSOLE_URL=https://github.com/neard/module-console/releases/download/r5/%NEARD_CONSOLE_FILE%
SET NEARD_GHOSTSCRIPT_URL=https://github.com/neard/module-ghostscript/releases/download/r3/%NEARD_GHOSTSCRIPT_FILE%
SET NEARD_GIT_URL=https://github.com/neard/module-git/releases/download/r11/%NEARD_GIT_FILE%

REM download module
SET DOWNLOAD_OPT=-L --output
ECHO download apache
CALL %CURL% %DOWNLOAD_OPT% tmp\%NEARD_APACHE_FILE% %NEARD_APACHE_URL%
ECHO download adminer
CALL %CURL% %DOWNLOAD_OPT% tmp\%NEARD_ADMINER_FILE% %NEARD_ADMINER_URL%
ECHO download php
CALL %CURL% %DOWNLOAD_OPT% tmp\%NEARD_PHP_FILE% %NEARD_PHP_URL%
ECHO download nodejs
CALL %CURL% %DOWNLOAD_OPT% tmp\%NEARD_NODEJS_FILE% %NEARD_NODEJS_URL%
ECHO download postgresql
CALL %CURL% %DOWNLOAD_OPT% tmp\%NEARD_POSTGRESQL_FILE% %NEARD_POSTGRESQL_URL%
ECHO download composer 
CALL %CURL% %DOWNLOAD_OPT% tmp\%NEARD_COMPOSER_FILE% %NEARD_COMPOSER_URL%
ECHO download consol
CALL %CURL% %DOWNLOAD_OPT% tmp\%NEARD_CONSOLE_FILE% %NEARD_CONSOLE_URL%
ECHO download ghostscript 
CALL %CURL% %DOWNLOAD_OPT% tmp\%NEARD_GHOSTSCRIPT_FILE% %NEARD_GHOSTSCRIPT_URL%
ECHO download git 
CALL %CURL% %DOWNLOAD_OPT% tmp\%NEARD_GIT_FILE% %NEARD_GIT_URL%

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

REM remove temp file
CALL @RD tmp
CALL @MD tmp