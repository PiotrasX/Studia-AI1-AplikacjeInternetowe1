#!/bin/bash

# Ustaw zmienne środowiskowe dla PostgreSQL
export PGPASSWORD=pgsql
export PGUSER=uzytkownik
export PGDATABASE=high_school
export PGHOST=localhost
export PGPORT=5432
PGADMIN_BIN_PATH="/usr/local/bin" # Popraw ścieżkę do pgAdmin4/psql

echo "PGPASSWORD=$PGPASSWORD"
echo "PGUSER=$PGUSER"
echo "PGDATABASE=$PGDATABASE"
echo "PGHOST=$PGHOST"
echo "PGPORT=$PGPORT"
echo "PGADMIN_BIN_PATH=$PGADMIN_BIN_PATH"

# Sprawdzenie istnienia psql
if [ ! -f "$PGADMIN_BIN_PATH/psql" ]; then
    echo "psql nie znaleziono w $PGADMIN_BIN_PATH"
    exit 1
fi

# Sprawdzenie, czy baza danych już istnieje
echo "Sprawdzanie istnienia bazy danych high_school..."
DB_EXISTS=$($PGADMIN_BIN_PATH/psql -U $PGUSER -h $PGHOST -p $PGPORT -tAc "SELECT 1 FROM pg_database WHERE datname='$PGDATABASE'")
if [ "$DB_EXISTS" == "1" ]; then
    echo "Baza danych high_school już istnieje."
else
    # Tworzenie bazy danych
    echo "Tworzenie bazy danych high_school..."
    $PGADMIN_BIN_PATH/psql -U $PGUSER -h $PGHOST -p $PGPORT -c "CREATE DATABASE $PGDATABASE;"

    if [ $? -ne 0 ]; then
        echo "Nie udalo sie utworzyc bazy danych."
        exit 1
    else
        echo "Baza danych high_school utworzona pomyslnie."
    fi
fi

# Kopiowanie pliku .env.example do .env jeśli nie istnieje
if [ ! -f ".env" ]; then
    if [ -f ".env.example" ]; then
        cp ".env.example" ".env"
    else
        echo "Plik .env.example nie istnieje. Tworzenie nowego pliku .env z podstawowymi ustawieniami."
        cat <<EOL > .env
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost
LOG_CHANNEL=stack
DB_CONNECTION=pgsql
DB_HOST=$PGHOST
DB_PORT=$PGPORT
DB_DATABASE=$PGDATABASE
DB_USERNAME=$PGUSER
DB_PASSWORD=$PGPASSWORD
SESSION_DRIVER=database
CACHE_DRIVER=database
QUEUE_CONNECTION=database
MAIL_MAILER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="\${APP_NAME}"
EOL
    fi
fi

# Aktualizacja pliku .env dla PostgreSQL
sed -i '' "s/^DB_CONNECTION=.*/DB_CONNECTION=pgsql/" .env
sed -i '' "s/^DB_HOST=.*/DB_HOST=$PGHOST/" .env
sed -i '' "s/^DB_PORT=.*/DB_PORT=$PGPORT/" .env
sed -i '' "s/^DB_DATABASE=.*/DB_DATABASE=$PGDATABASE/" .env
sed -i '' "s/^DB_USERNAME=.*/DB_USERNAME=$PGUSER/" .env
sed -i '' "s/^DB_PASSWORD=.*/DB_PASSWORD=$PGPASSWORD/" .env

# Instalacja zależności
composer install --prefer-dist

# Dodanie niezbędnych pakietów
composer require stripe/stripe-php --prefer-dist
composer require bensampo/laravel-enum --prefer-dist

# Generowanie klucza aplikacji
php artisan key:generate

# Tworzenie symbolicznego linku do storage
php artisan storage:link

# Migracja i seedowanie bazy danych tylko z użyciem DatabaseSeeder.php
php artisan migrate:fresh --seed --seeder=DatabaseSeeder

# Dodanie IDE Helpera
composer require --dev barryvdh/laravel-ide-helper --prefer-dist
php artisan ide-helper:generate

# Optymalizacja aplikacji
php artisan optimize

# Uruchomienie serwera
php -S 127.0.0.1:8000 -t public &

# Otwarcie strony w przeglądarce
open http://127.0.0.1:8000

# Otwarcie projektu w Visual Studio Code
code .

# Zatrzymanie skryptu, aby nie zamykał się natychmiast
wait
