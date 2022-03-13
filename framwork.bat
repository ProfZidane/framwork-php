@echo off

:: Prendre la décision de l'user
:: set /p MYNAME="Name: "
:: echo Your name is: %MYNAME%
::color 0A


setlocal

ECHO =========================================================================================================================
ECHO ========================================= Bienvenue sur mon petit utilitaire  ! =========================================
ECHO ===================================== Vivez une belle experience avec notre framwork =====================================
ECHO =========================================================================================================================

:: color 0C
:: ECHO Choisissez une option : 
ECHO 1. Creer un model
ECHO 2. Creer un controller
ECHO 3. Creer une vue
ECHO 4. A propos

set choice=
set /p choice=Choisissez une option :


if %choice% ==1 goto :makeModel

if %choice% ==2 goto :makeController

if %choice% ==3 goto :makeView

if %choice% ==4 goto :about


:makeModel
set /p MYNAME="Entrez le nom du model (le meme que celui de la table): "
:: echo %MYNAME:~0,1%

if %MYNAME:~0,1% ==a set MYNAME=%MYNAME:*a=A%
if %MYNAME:~0,1% ==b set MYNAME=%MYNAME:*b=B%
if %MYNAME:~0,1% ==c set MYNAME=%MYNAME:*c=C%
if %MYNAME:~0,1% ==d set MYNAME=%MYNAME:*d=D%
if %MYNAME:~0,1% ==e set MYNAME=%MYNAME:*e=E%
if %MYNAME:~0,1% ==f set MYNAME=%MYNAME:*f=F%
if %MYNAME:~0,1% ==g set MYNAME=%MYNAME:*g=G%
if %MYNAME:~0,1% ==h set MYNAME=%MYNAME:*h=H%
if %MYNAME:~0,1% ==i set MYNAME=%MYNAME:*i=I%
if %MYNAME:~0,1% ==j set MYNAME=%MYNAME:*j=J%
if %MYNAME:~0,1% ==k set MYNAME=%MYNAME:*k=K%
if %MYNAME:~0,1% ==l set MYNAME=%MYNAME:*l=L%
if %MYNAME:~0,1% ==m set MYNAME=%MYNAME:*m=M%
if %MYNAME:~0,1% ==n set MYNAME=%MYNAME:*n=N%
if %MYNAME:~0,1% ==o set MYNAME=%MYNAME:*o=O%
if %MYNAME:~0,1% ==p set MYNAME=%MYNAME:*p=P%
if %MYNAME:~0,1% ==q set MYNAME=%MYNAME:*q=Q%
if %MYNAME:~0,1% ==r set MYNAME=%MYNAME:*r=R%
if %MYNAME:~0,1% ==s set MYNAME=%MYNAME:*s=S%
if %MYNAME:~0,1% ==t set MYNAME=%MYNAME:*t=T%
if %MYNAME:~0,1% ==u set MYNAME=%MYNAME:*u=U%
if %MYNAME:~0,1% ==v set MYNAME=%MYNAME:*v=V%
if %MYNAME:~0,1% ==w set MYNAME=%MYNAME:*w=W%
if %MYNAME:~0,1% ==x set MYNAME=%MYNAME:*x=X%
if %MYNAME:~0,1% ==y set MYNAME=%MYNAME:*y=Y%
if %MYNAME:~0,1% ==z set MYNAME=%MYNAME:*z=Z%


:: echo %MYNAME%
echo ^<?php > app/src/Models/%MYNAME%.php
echo    namespace App; >> app/src/Models/%MYNAME%.php
echo    use App\Model; >> app/src/Models/%MYNAME%.php
echo    class Conducteur extends Model { >> app/src/Models/%MYNAME%.php
echo    // Tableau de formatage des attributs de la table >> app/src/Models/%MYNAME%.php
echo        protected $fillable = [  >> app/src/Models/%MYNAME%.php
echo        ]; >> app/src/Models/%MYNAME%.php
echo    } >> app/src/Models/%MYNAME%.php

echo Model %MYNAME% a ete cree !

exit /b 0


:makeController
set /p MYNAMEC="Entrez le nom du controller: "
:: echo %MYNAME:~0,1%

if %MYNAMEC:~0,1% ==a set MYNAMEC=%MYNAMEC:*a=A%
if %MYNAMEC:~0,1% ==b set MYNAMEC=%MYNAMEC:*b=B%
if %MYNAMEC:~0,1% ==c set MYNAMEC=%MYNAMEC:*c=C%
if %MYNAMEC:~0,1% ==d set MYNAMEC=%MYNAMEC:*d=D%
if %MYNAMEC:~0,1% ==e set MYNAMEC=%MYNAMEC:*e=E%
if %MYNAMEC:~0,1% ==f set MYNAMEC=%MYNAMEC:*f=F%
if %MYNAMEC:~0,1% ==g set MYNAMEC=%MYNAMEC:*g=G%
if %MYNAMEC:~0,1% ==h set MYNAMEC=%MYNAMEC:*h=H%
if %MYNAMEC:~0,1% ==i set MYNAMEC=%MYNAMEC:*i=I%
if %MYNAMEC:~0,1% ==j set MYNAMEC=%MYNAMEC:*j=J%
if %MYNAMEC:~0,1% ==k set MYNAMEC=%MYNAMEC:*k=K%
if %MYNAMEC:~0,1% ==l set MYNAMEC=%MYNAMEC:*l=L%
if %MYNAMEC:~0,1% ==m set MYNAMEC=%MYNAMEC:*m=M%
if %MYNAMEC:~0,1% ==n set MYNAMEC=%MYNAMEC:*n=N%
if %MYNAMEC:~0,1% ==o set MYNAMEC=%MYNAMEC:*o=O%
if %MYNAMEC:~0,1% ==p set MYNAMEC=%MYNAMEC:*p=P%
if %MYNAMEC:~0,1% ==q set MYNAMEC=%MYNAMEC:*q=Q%
if %MYNAMEC:~0,1% ==r set MYNAMEC=%MYNAMEC:*r=R%
if %MYNAMEC:~0,1% ==s set MYNAMEC=%MYNAMEC:*s=S%
if %MYNAMEC:~0,1% ==t set MYNAMEC=%MYNAMEC:*t=T%
if %MYNAMEC:~0,1% ==u set MYNAMEC=%MYNAMEC:*u=U%
if %MYNAMEC:~0,1% ==v set MYNAMEC=%MYNAMEC:*v=V%
if %MYNAMEC:~0,1% ==w set MYNAMEC=%MYNAMEC:*w=W%
if %MYNAMEC:~0,1% ==x set MYNAMEC=%MYNAMEC:*x=X%
if %MYNAMEC:~0,1% ==y set MYNAMEC=%MYNAMEC:*y=Y%
if %MYNAMEC:~0,1% ==z set MYNAMEC=%MYNAMEC:*z=Z%


set MYNAMEC=%MYNAMEC%Controller

:: echo %MYNAMEC%

echo ^<?php > app/src/Controllers/%MYNAMEC%.php
echo        use App\Controller; >> app/src/Controllers/%MYNAMEC%.php
echo        //ne pas oublier d'importer le model approprié >> app/src/Controllers/%MYNAMEC%.php
echo        class %MYNAMEC% extends Controller { >> app/src/Controllers/%MYNAMEC%.php
echo            public function __contruct() { >> app/src/Controllers/%MYNAMEC%.php
echo                parent::__contruct(); >> app/src/Controllers/%MYNAMEC%.php
echo            } >> app/src/Controllers/%MYNAMEC%.php
echo            public function index() { >> app/src/Controllers/%MYNAMEC%.php
echo            } >> app/src/Controllers/%MYNAMEC%.php
echo            public function have() { >> app/src/Controllers/%MYNAMEC%.php
echo            } >> app/src/Controllers/%MYNAMEC%.php
echo            public function store() { >> app/src/Controllers/%MYNAMEC%.php
echo            } >> app/src/Controllers/%MYNAMEC%.php
echo            public function update() { >> app/src/Controllers/%MYNAMEC%.php
echo            } >> app/src/Controllers/%MYNAMEC%.php
echo            public function delete() { >> app/src/Controllers/%MYNAMEC%.php
echo            } >> app/src/Controllers/%MYNAMEC%.php
echo        }   >> app/src/Controllers/%MYNAMEC%.php

echo Controller %MYNAMEC% a ete cree !

exit /b 0


:about
echo:
echo Aide dans la creation des models et controllers
echo Pour plus de facilitation, inserer dans les variables env


:makeView
echo:
set /p MYNAMEV="Entrez le nom de la vue: "
echo    ^<p^> > ressources/views/%MYNAMEV%.php
echo    la vue %MYNAMEV% a été créée >> ressources/views/%MYNAMEV%.php
echo    ! ^</p^> >> ressources/views/%MYNAMEV%.php
echo Vue %MYNAMEV% a ete cree !

exit /b 0

endlocal
