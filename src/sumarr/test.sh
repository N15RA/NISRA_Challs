#!/bin/bash
PROB=sumarr
docker build . -t roy4801/${PROB}
docker run -p 127.0.0.1:8888:1337 $1 --name pwn_test --rm roy4801/${PROB} $2