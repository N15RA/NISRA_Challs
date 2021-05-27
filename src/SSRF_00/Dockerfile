FROM php:7-apache
LABEL maintainer="theo@nisra.net"

RUN apt-get update && \
    apt-get install -y wget && \
    rm -rf /var/lib/apt/lists/*

COPY src /var/www/html
RUN chown -R www-data:www-data /var/www/html && \
    echo "NISRA{h0w_c4n_y0u_wg3t_my_f14g!}" > /flag.txt

EXPOSE 80
