# Usa l'immagine ufficiale di PHP con Apache
FROM php:8.2-apache

# Aggiorna i pacchetti e installa dipendenze necessarie
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    mariadb-client \
    default-mysql-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install mysqli pdo pdo_mysql

# Abilita il modulo di riscrittura di Apache
RUN a2enmod rewrite

# Imposta il ServerName per evitare il messaggio AH00558
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copia il codice della tua applicazione PHP nella cartella predefinita di Apache
COPY ./src /var/www/html/

# Imposta i permessi per la cartella di Apache
RUN chown -R www-data:www-data /var/www/html/

# Esponi la porta 80 per HTTP
EXPOSE 80