#!/bin/bash
PROB=keygen
docker build . -t roy4801/$PROB
docker run -p 127.0.0.1:8888:1337 --name pwn_test --rm $1 roy4801/$PROB