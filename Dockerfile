FROM php:8.2-apache
COPY ./src/apache/ /var/www/html/
RUN apt-get update && apt-get install -y libmariadb-dev
RUN a2enmod rewrite
RUN echo '<Directory "/var/www/html/">\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' >> /etc/apache2/sites-available/000-default.conf
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html
RUN docker-php-ext-install mysqli
