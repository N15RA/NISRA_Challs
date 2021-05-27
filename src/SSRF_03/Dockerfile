FROM php:7-apache
LABEL maintainer="theo@nisra.net"

RUN apt-get update && \
    apt-get install -y socat && \
    rm -rf /var/lib/apt/lists/*

COPY src /var/www/html
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
RUN echo service apache2 start > start.sh && \
    echo 'php -S 127.0.0.66:54321 SADJFASDGASNGOASNFDGOANSFDG.php'  >> start.sh && \
    echo "<?php die('NISRA{w34k_p4rs3r_1s_s0_sc4r3d!!}'); ?>" > SADJFASDGASNGOASNFDGOANSFDG.php && \
    chmod +x start.sh
CMD ["./start.sh"]