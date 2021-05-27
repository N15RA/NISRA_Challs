#!/usr/bin/env python
# -*- coding: utf-8 -*-
from pwn import *

context(arch='i386', os='linux')
_ATT = 0
_local = 0

host = "127.0.0.1"
port = "8888"

if _local:
	r = process('./SimpleKeyGen')
else:
	r = remote(host, port)

if _ATT:
	log.info('Waiting for attach...')
	raw_input()

k = 40
def genKey():
	global k
	if k == 77:
		k = 97
	s = ''
	for i in range(16):
		s += chr(k + i)
	k += 1
	return s

print r.recvuntil('>>')
for i in range(50):
	s = genKey()
	print s
	r.sendline(s)
	print r.recv()