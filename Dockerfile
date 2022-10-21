FROM php:7.2.5-apache
 
WORKDIR /var/www/html
 
#  Install required packages
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libjpeg62-turbo-dev libfreetype6-dev unzip wget
RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/
RUN docker-php-ext-install mysqli pdo pdo_mysql gd
RUN apt-get install -y htop iputils-ping

# Install composer
RUN wget https://getcomposer.org/installer -O /tmp/composer-setup.php
RUN php /tmp/composer-setup.php
# RUN rm /tmp/composer-setup.php
RUN mv composer.phar /usr/local/bin/composer
 
#  Enable Apache modules
RUN a2enmod rewrite proxy_wstunnel proxy_http proxy headers