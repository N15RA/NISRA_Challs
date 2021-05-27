all: lab3

lab3: main.c
	gcc -fno-stack-protector -m32 -O0 $< -o $@

.PHONY: clean

clean:
	rm -f ./lab3