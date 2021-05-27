all: bof_1_act


bof_1_act: bof_1_act.c
	gcc -m32 -fno-stack-protector $^ -o $@

.PHONY: clean

clean:
	rm -f ./bof_1_act