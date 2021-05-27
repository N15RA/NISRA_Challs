FROM i386/alpine:latest
LABEL maintainer="roy@nisra.net"

RUN apk update && \
	apk add libc-dev ucspi-tcp gcc make && \
	rm -rf /var/cache/apk/*

# create ctf-user
RUN adduser -u 1337 -D -s /bin/bash -h /home/ctf ctf
WORKDIR /home/ctf/

COPY ./src .

# Perm
RUN chown ctf:ctf ./* && \
	chmod 775 ./*.sh

USER ctf

CMD ["/home/ctf/tcpser.sh"]