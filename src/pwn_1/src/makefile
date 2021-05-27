all: lab1

lab1 : main.c
	gcc -fno-stack-protector -m32 $< -o $@

.PHONY: clean

clean:
	rm ./lab1