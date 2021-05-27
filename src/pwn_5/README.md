# gothijack

## info

```
[*] '/home/roy4801/Desktop/ctf/ntust/pwn/gothijack/gothijack'
    Arch:     amd64-64-little
    RELRO:    Partial RELRO
    Stack:    Canary found
    NX:       NX disabled
    PIE:      No PIE (0x400000)
    RWX:      Has RWX segments
```

```
gdb-peda$ vmmap
Start              End                Perm	Name
0x00400000         0x00401000         r-xp	/home/roy4801/Desktop/ctf/ntust/pwn/gothijack/gothijack
0x00600000         0x00601000         r-xp	/home/roy4801/Desktop/ctf/ntust/pwn/gothijack/gothijack
0x00601000         0x00602000         rwxp	/home/roy4801/Desktop/ctf/ntust/pwn/gothijack/gothijack
0x00007ffff79e4000 0x00007ffff7bcb000 r-xp	/lib/x86_64-linux-gnu/libc-2.27.so
0x00007ffff7bcb000 0x00007ffff7dcb000 ---p	/lib/x86_64-linux-gnu/libc-2.27.so
0x00007ffff7dcb000 0x00007ffff7dcf000 r-xp	/lib/x86_64-linux-gnu/libc-2.27.so
0x00007ffff7dcf000 0x00007ffff7dd1000 rwxp	/lib/x86_64-linux-gnu/libc-2.27.so
0x00007ffff7dd1000 0x00007ffff7dd5000 rwxp	mapped
0x00007ffff7dd5000 0x00007ffff7dfc000 r-xp	/lib/x86_64-linux-gnu/ld-2.27.so
0x00007ffff7fdb000 0x00007ffff7fdd000 rwxp	mapped
0x00007ffff7ff8000 0x00007ffff7ffb000 r--p	[vvar]
0x00007ffff7ffb000 0x00007ffff7ffc000 r-xp	[vdso]
0x00007ffff7ffc000 0x00007ffff7ffd000 r-xp	/lib/x86_64-linux-gnu/ld-2.27.so
0x00007ffff7ffd000 0x00007ffff7ffe000 rwxp	/lib/x86_64-linux-gnu/ld-2.27.so
0x00007ffff7ffe000 0x00007ffff7fff000 rwxp	mapped
0x00007ffffffde000 0x00007ffffffff000 rwxp	[stack]
0xffffffffff600000 0xffffffffff601000 r-xp	[vsyscall]
```

## note

* Thinking
  * Write shellcode to the global var `name` and rewrite one of the function in the GOT that calling below

0000000000601080    64 OBJECT  GLOBAL DEFAULT   24 name
0000000000601018 R_X86_64_JUMP_SLOT  puts@GLIBC_2.2.5

## steps

objdump -RT ./gothijack
