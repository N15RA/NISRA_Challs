FROM ubuntu:16.04
LABEL maintainer="roy@nisra.net"

# Change apt src
RUN sed -i 's/archive.ubuntu.com/free.nchc.org.tw/g' /etc/apt/sources.list

# Apt update && upgrade
RUN dpkg --add-architecture i386
RUN apt-get update --fix-missing && apt-get -y upgrade
RUN apt-get install -y libc6:i386 libstdc++6:i386
RUN apt-get install -y libc6-dev-i386 gcc g++

RUN apt-get install -y ucspi-tcp make

# create ctf-user
RUN useradd -u 1337 -U -m -s /bin/bash ctf

WORKDIR /home/ctf/
COPY ./serve.cpp ./SimpleKeyGen ./tcpser.sh ./
COPY ./makefile ./

# make
RUN make
RUN rm -f ./makefile
RUN rm -f ./serve.cpp

# Perm
RUN chmod 775 /home/ctf/tcpser.sh
RUN chmod 775 /home/ctf/serve

USER ctf

# Set problem env var
ENV PROB=serve

CMD ["/home/ctf/tcpser.sh"]