
# Usa l'immagine ufficiale di PHP con Apache
FROM php:8.3-apache

# recuperare un file locale php.ini , caricarlo nella build , cancellare l'immagine vecchia e ricomporre il tutto
COPY php.ini /usr/local/etc/php/
# Aggiorna i pacchetti e installa dipendenze necessarie
RUN apt-get update && apt-get install -y \    
libfreetype6-dev \
libjpeg62-turbo-dev \
libpng-dev \
&& docker-php-ext-configure gd --with-freetype --with-jpeg \
&& docker-php-ext-install -j$(nproc) gd \
&& docker-php-ext-install pdo_mysql
# Imposto la directory di lavoro all'interno del container
WORKDIR /var/www/html

# Imposta il ServerName per evitare il messaggio AH00558
RUN echo "ServerName localhost:9080" >> /etc/apache2/apache2.conf

# Copia il codice della tua applicazione PHP nella cartella predefinita di Apache
COPY ./src /var/www/html/

# Imposta i permessi per la cartella di Apache
RUN chown -R www-data:www-data /var/www/html/

# Esponi la porta 80 per HTTP
EXPOSE 80

# Comando per avviare Apache
CMD [ "apache2-foreground" ]