CXX=g++
CFLAGS=-std=c++11 -Wall -fPIE -pie -z now
LIBS=

all: serve

serve: serve.cpp
	${CXX} ${CFLAGS} ${LIBS} $^ -o $@

.PHONY: clean

clean:
	rm -f ./serve