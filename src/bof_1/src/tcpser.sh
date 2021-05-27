#!/bin/sh
make

tcpserver -v -t 3 -RHl0 0.0.0.0 1337 sh -c 'exec ./bof_1_act 2>&1'