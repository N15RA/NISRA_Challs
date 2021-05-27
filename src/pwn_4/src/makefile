CFLAGS=-m64 -O0 -mpreferred-stack-boundary=4
SEC=-fno-stack-protector -z lazy -no-pie

all: lab1

lab1: main.c
	gcc $(CFLAGS) $(SEC) $< -o $@

.PHONY: clean test
clean:
	rm -f ./lab1