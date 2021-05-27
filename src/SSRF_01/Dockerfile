FROM php:7-apache
LABEL maintainer="theo@nisra.net"

RUN apt-get update && \
    apt-get install -y socat && \
    rm -rf /var/lib/apt/lists/*

COPY src /var/www/html
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
RUN echo service apache2 start > start.sh && \
    echo 'socat TCP-LISTEN:54321,fork EXEC:"echo NISRA{intr4n3t_1_4m_c0m1ng~}"' >> start.sh && \
    chmod +x start.sh
CMD ["./start.sh"]