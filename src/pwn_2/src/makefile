all: lab2

lab2: main.c
	gcc -fno-stack-protector -m32 $< -o $@

.PHONY: clean

clean:
	rm -f lab2