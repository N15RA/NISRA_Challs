CFLAGS=-m32 -O0
SEC=-fno-stack-protector -z lazy -no-pie

all: rop1

rop1: main.c
	gcc $(CFLAGS) $(SEC) -static $^ -o $@

.PHONY: clean test
clean:
	rm -f ./rop1

test: rop1
	cp -f ./rop1 ./tmp