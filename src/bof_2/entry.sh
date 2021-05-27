#!/bin/bash

# Disable ASLR
echo 0 > /proc/sys/kernel/randomize_va_space
# Login as ctf
exec su - ctf ./tcpser.sh