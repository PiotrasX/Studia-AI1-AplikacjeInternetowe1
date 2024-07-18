@echo off

REM Ustawienie zmiennych środowiskowych dla PostgreSQL
set "PGPASSWORD=pgsql"
set "PGUSER=uzytkownik"
set "PGDATABASE=high_school"
set "PGHOST=localhost"
set "PGPORT=5432"
set "PGADMIN_BIN_PATH=C:\Program Files\PostgreSQL\16\bin"

REM Ustawienie zmiennej dla ścieżki projektu
set "PROJECT_PATH=%~dp0"

cd /d "%PROJECT_PATH%"

echo PGPASSWORD=%PGPASSWORD%
echo PGUSER=%PGUSER%
echo PGDATABASE=%PGDATABASE%
echo PGHOST=%PGHOST%
echo PGPORT=%PGPORT%
echo PGADMIN_BIN_PATH=%PGADMIN_BIN_PATH%

REM Sprawdzenie istnienia psql.exe
if not exist "%PGADMIN_BIN_PATH%\psql.exe" (
    echo psql.exe nie znaleziono w %PGADMIN_BIN_PATH%
    pause
    exit /b 1
)

REM Sprawdzenie, czy baza danych już istnieje
echo Sprawdzanie istnienia bazy danych high_school...
"%PGADMIN_BIN_PATH%\psql.exe" -U %PGUSER% -h %PGHOST% -p %PGPORT% -tAc "SELECT 1 FROM pg_database WHERE datname='%PGDATABASE%'" | findstr /B /C:"1"
if %errorlevel% equ 0 (
    echo Baza danych high_school już istnieje.
) else (
    REM Tworzenie bazy danych
    echo Tworzenie bazy danych high_school...
    "%PGADMIN_BIN_PATH%\psql.exe" -U %PGUSER% -h %PGHOST% -p %PGPORT% -c "CREATE DATABASE high_school;"

    if %errorlevel% neq 0 (
        echo Nie udalo sie utworzyc bazy danych.
        pause
        exit /b %errorlevel%
    ) else (
        echo Baza danych high_school utworzona pomyslnie.
    )
)

REM Kopiowanie pliku .env.example do .env jeśli nie istnieje
if not exist ".env" (
    if exist ".env.example" (
        copy ".env.example" ".env"
    ) else (
        echo Plik .env.example nie istnieje. Tworzenie nowego pliku .env z podstawowymi ustawieniami.
        (
            echo APP_NAME=Laravel
            echo APP_ENV=local
            echo APP_KEY=
            echo APP_DEBUG=true
            echo APP_URL=http://localhost
            echo LOG_CHANNEL=stack
            echo DB_CONNECTION=pgsql
            echo DB_HOST=%PGHOST%
            echo DB_PORT=%PGPORT%
            echo DB_DATABASE=%PGDATABASE%
            echo DB_USERNAME=%PGUSER%
            echo DB_PASSWORD=%PGPASSWORD%
            echo SESSION_DRIVER=database
            echo CACHE_DRIVER=database
            echo QUEUE_CONNECTION=database
            echo MAIL_MAILER=smtp
            echo MAIL_HOST=mailtrap.io
            echo MAIL_PORT=2525
            echo MAIL_USERNAME=null
            echo MAIL_PASSWORD=null
            echo MAIL_ENCRYPTION=null
            echo MAIL_FROM_ADDRESS="hello@example.com"
            echo MAIL_FROM_NAME="${APP_NAME}"
        ) > .env
    )
)

REM Aktualizacja pliku .env dla PostgreSQL
powershell -Command "(Get-Content .env) -replace 'DB_CONNECTION=.*', 'DB_CONNECTION=pgsql' | Set-Content .env"
powershell -Command "(Get-Content .env) -replace 'DB_HOST=.*', 'DB_HOST=%PGHOST%' | Set-Content .env"
powershell -Command "(Get-Content .env) -replace 'DB_PORT=.*', 'DB_PORT=%PGPORT%' | Set-Content .env"
powershell -Command "(Get-Content .env) -replace 'DB_DATABASE=.*', 'DB_DATABASE=%PGDATABASE%' | Set-Content .env"
powershell -Command "(Get-Content .env) -replace 'DB_USERNAME=.*', 'DB_USERNAME=%PGUSER%' | Set-Content .env"
powershell -Command "(Get-Content .env) -replace 'DB_PASSWORD=.*', 'DB_PASSWORD=%PGPASSWORD%' | Set-Content .env"

REM Instalacja zależności
call composer install --prefer-dist

REM Dodanie niezbędnych pakietów
call composer require stripe/stripe-php --prefer-dist
call composer require bensampo/laravel-enum --prefer-dist

REM Generowanie klucza aplikacji
call php artisan key:generate

REM Tworzenie symbolicznego linku do storage
call php artisan storage:link

REM Migracja i seedowanie bazy danych tylko z użyciem DatabaseSeeder.php
call php artisan migrate:fresh --seed --seeder=DatabaseSeeder

REM Dodanie IDE Helpera
call composer require --dev barryvdh/laravel-ide-helper --prefer-dist
call php artisan ide-helper:generate

REM Optymalizacja aplikacji
call php artisan optimize

REM Uruchomienie serwera
start /b php -S 127.0.0.1:8000 -t public

REM Otwarcie strony w przeglądarce
start http://127.0.0.1:8000

REM Otwarcie projektu w Visual Studio Code
code "%PROJECT_PATH%"

pause
