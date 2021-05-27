FROM python:3.6-stretch
LABEL maintainer="theo@nisra.net"

RUN apt-get update && \
    apt-get install -y netcat && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN pip install pycrypto

WORKDIR /opt
COPY src /opt

CMD ["sh", "start.sh"]