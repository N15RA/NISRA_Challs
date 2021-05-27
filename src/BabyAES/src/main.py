#!/usr/local/bin/python
from Crypto.Cipher import AES
import hashlib


def pad(s):
    while len(s) % 16 != 0:
        s += "0"
    return s


def sha256(s):
    k = hashlib.sha256()
    k.update(s.encode('utf-8'))
    return k.digest()


def encrypt(s):
    flag = "NISRA{n0w_y0u_kn0w_AES-ECB!_lol}"
    cipher = AES.new(sha256(flag), AES.MODE_ECB)
    secret = cipher.encrypt(pad('{}{}'.format(s, flag))).hex()
    return secret


if __name__ == '__main__':
    while True:
        name = input('Give me your name (without space): ')
        if ' ' in name:
            name = name.replace(' ', '')
        print('Your secret is: ' + encrypt(name))