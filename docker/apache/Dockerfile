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

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Python has an official image. Alpine and slim are the small versions

RUN apt-get -y install python3-pip



RUN npm install -g npm@9.2.0


#Define o diretório de trabalho
WORKDIR /var/www/html

#Copia o código da aplicação para o container
COPY ./src /var/www/html

#Copia o script de entrypoint
COPY ./docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh


CMD ["/entrypoint.sh"]
