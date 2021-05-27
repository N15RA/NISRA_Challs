FROM ubuntu:16.04
LABEL maintainer="roy@nisra.net"

# Change apt src
RUN sed -i 's/archive.ubuntu.com/free.nchc.org.tw/g' /etc/apt/sources.list

# Apt update && upgrade
RUN dpkg --add-architecture i386
RUN apt-get update --fix-missing && apt-get -y upgrade
RUN apt-get install -y libc6:i386 libstdc++6:i386
RUN apt-get install -y libc6-dev-i386

RUN apt-get install -y ucspi-tcp

# TESTING
RUN apt-get install -y gcc

# create ctf-user
RUN useradd -u 1337 -U -m -s /bin/bash ctf

COPY ./bof_2 ./tcpser.sh ./entry.sh /home/ctf/

# Copy flags
COPY ./something_very_special /home/ctf/
COPY ./flag.txt /
RUN chmod 664 /flag.txt

WORKDIR /home/ctf/
# USER ctf

# Unused
ENV PROB=bof_2

CMD ["/home/ctf/entry.sh"]