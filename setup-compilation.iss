; Script generated by the Inno Setup Script Wizard.
; SEE THE DOCUMENTATION FOR DETAILS ON CREATING INNO SETUP SCRIPT FILES!

#define MyAppName "Andekata"
#define MyAppVersion "1.0.3"
#define MyAppPublisher "Ajaro"
#define MyAppURL "http://ajaro.id/"
#define MyAppExeName "neard.exe"

[Setup]
; NOTE: The value of AppId uniquely identifies this application.
; Do not use the same AppId value in installers for other applications.
; (To generate a new GUID, click Tools | Generate GUID inside the IDE.)
AppId={{C1AE71A2-8D80-4488-8E4C-EC8B4030B39B}
AppName={#MyAppName}
AppVersion={#MyAppVersion}
;AppVerName={#MyAppName} {#MyAppVersion}
AppPublisher={#MyAppPublisher}
AppPublisherURL={#MyAppURL}
AppSupportURL={#MyAppURL}
AppUpdatesURL={#MyAppURL}
DefaultDirName={pf}\{#MyAppName}
DisableProgramGroupPage=yes
LicenseFile=C:\Ajaro\Andekata.bak\lisensi.txt
OutputDir=C:\Ajaro
OutputBaseFilename=andekata-setup-{#MyAppVersion}
Compression=lzma
SolidCompression=yes
DisableDirPage=yes
ShowTasksTreeLines=yes

[Languages]
Name: "english"; MessagesFile: "compiler:Default.isl"

[Tasks]
Name: "desktopicon"; Description: "{cm:CreateDesktopIcon}"; GroupDescription: "{cm:AdditionalIcons}"; Flags: unchecked

[Files]
Source: "C:\Ajaro\Andekata.bak\neard.exe"; DestDir: "{app}"; Flags: ignoreversion
Source: "C:\Ajaro\Andekata.bak\*"; Excludes: "\setup-compilation.iss, \.gitignore, \tes.bat"; DestDir: "{app}"; Flags: ignoreversion recursesubdirs createallsubdirs
; NOTE: Don't use "Flags: ignoreversion" on any shared system files

[Icons]
Name: "{commonprograms}\{#MyAppName}"; Filename: "{app}\{#MyAppExeName}"; IconFilename: "{app}\core\resources\icons\app.ico"
Name: "{commondesktop}\{#MyAppName}"; Filename: "{app}\{#MyAppExeName}"; Tasks: desktopicon; IconFilename: "{app}\core\resources\icons\app.ico"

[Run]
Filename: "{app}\andekata-scripts\andekata-installation.bat"; WorkingDir: "{app}"; Flags: shellexec waituntilterminated; StatusMsg: "Setup Environment..."
Filename: "{app}\core\libs\php\php-win.exe"; Parameters: "bootstrap.php startup"; WorkingDir: "{app}\core"; Flags: shellexec waituntilterminated; StatusMsg: "Setup Startup..."
Filename: "{app}\core\libs\php\php-win.exe"; Parameters: "bootstrap.php reload"; WorkingDir: "{app}\core"; Flags: shellexec waituntilterminated; StatusMsg: "Reload..."
Filename: "{app}\core\libs\php\php-win.exe"; Parameters: "bootstrap.php checkVersion"; WorkingDir: "{app}\core"; Flags: shellexec waituntilterminated; StatusMsg: "Checking Version..."
Filename: "{app}\core\libs\php\php-win.exe"; Parameters: "bootstrap.php exec"; WorkingDir: "{app}\core"; Flags: shellexec waituntilterminated; StatusMsg: "Executing..."
Filename: "{app}\andekata-scripts\andekata-api-setup.bat"; WorkingDir: "{app}\apps"; Flags: shellexec waituntilterminated; StatusMsg: "Setup Andekata API..."
Filename: "{app}\andekata-scripts\andekata-client-setup.bat"; WorkingDir: "{app}\apps"; Flags: shellexec waituntilterminated; StatusMsg: "Setup Andekata Client..."


[UninstallRun]
Filename: "{app}\core\libs\hostseditor\HostsEditor.exe /d api.andekata.app"; WorkingDir: "{app}"; Flags: shellexec waituntilterminated; StatusMsg: "Remove api.andekata.app from hosts"
Filename: "{app}\core\libs\hostseditor\HostsEditor.exe /d andekata.app"; WorkingDir: "{app}"; Flags: shellexec waituntilterminated; StatusMsg: "Remove andekata.app from hosts"

[UninstallDelete]
Type: files; Name: "{app}\*"
Type: filesandordirs; Name: "{app}"