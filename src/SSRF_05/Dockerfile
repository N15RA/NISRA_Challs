FROM php:7-apache
LABEL maintainer="theo@nisra.net"

RUN apt-get update && \
    apt-get install -y socat && \
    rm -rf /var/lib/apt/lists/*

COPY src /var/www/html
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
RUN echo service apache2 start > start.sh && \
    echo 'socat TCP-LISTEN:3306,fork TCP:ssrf_05_mysql:3306' >> start.sh && \
    chmod +x start.sh
CMD ["./start.sh"]