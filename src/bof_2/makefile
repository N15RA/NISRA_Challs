COMPILER=-m32 -fno-stack-protector -zexecstack
CFLAGS=

all: bof_2

bof_2: bof_2.c
	gcc ${COMPILER} $^ -o $@

.PHONY: clean

clean:
	rm -f ./bof_2