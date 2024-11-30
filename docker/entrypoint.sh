#!/bin/bash

#Rodar composer install se a pasta vendor não existir
if [ ! -d "/var/www/html/vendor" ]; then
    echo "Instalando dependências do Laravel..."
    composer install
fi

#Rodar as migrations se necessário
if [ ! -d "/var/www/html/database/migrations" ]; then
    echo "Rodando as migrations do Laravel..."
    php artisan migrate
fi

#Iniciar o Apache
exec apache2-foreground