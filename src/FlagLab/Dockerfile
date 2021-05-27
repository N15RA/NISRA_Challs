FROM gitlab/gitlab-ce:11.4.7-ce.0
LABEL maintainer="theo@nisra.net"

RUN apt-get update && \
    apt-get install -y netcat && \
    rm -rf /var/lib/apt/lists/*