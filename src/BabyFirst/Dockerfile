FROM php:7-apache
LABEL maintainer="theo@nisra.net"
COPY src /var/www/html
COPY README.txt /README.txt
WORKDIR /var/www/html
RUN mkdir /var/www/html/sandbox && \
    chown -R www-data:www-data /var/www/html/ && \
    ln -s /bin/true /bin/nisra && \
    apt-get update && \
    apt-get install wget -y && \
    rm -rf /var/lib/apt/lists/* && \
    usermod -G www-data root
EXPOSE 80
