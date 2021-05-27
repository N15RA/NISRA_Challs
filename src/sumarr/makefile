CFLAG=-std=c11 -m32 -fno-stack-protector

.PHONY: clean

all: sumarr

sumarr: sumarr.c
	gcc ${CFLAG} $^ -o $@

clean:
	rm -f ./sumarr