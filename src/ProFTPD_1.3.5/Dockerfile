FROM ubuntu:trusty

LABEL maintainer="theo@nisra.net"

# Install build packages and Apache2
RUN apt-get update && \
    apt-get install -y wget gcc g++ make apache2 php5 && \
    apt-get clean

# Build & install ProFTPD 1.3.5
ADD proftpd-1.3.5.tar.gz /tmp/
RUN cd /tmp/proftpd-1.3.5 && \
    sed -i 's/__mempcpy/mempcpy/g' lib/pr_fnmatch.c && \
    ./configure --with-modules=mod_copy && \
    make && make install

RUN chmod 777 -R /var/www/html/
ADD flag.php /var/www/html/flag.php
EXPOSE 21 80

CMD apachectl -f /etc/apache2/apache2.conf && proftpd --nodaemon