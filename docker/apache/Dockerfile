FROM php:8.2.0-apache


#Instala as extensões necessárias do PHP
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip

#Habilita mod_rewrite para o Apache
RUN a2enmod rewrite

#Define o diretório de trabalho
WORKDIR /var/www/html

#Copia o código da aplicação para o container
COPY ./src /var/www/html

#Copia o script de entrypoint
COPY ./docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

#Expondo a porta 80 para a comunicação com o host na porta 9000
EXPOSE 80

CMD ["/entrypoint.sh"]