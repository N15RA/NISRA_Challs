#!/bin/bash
tcpserver -v -t 3 -RHl0 0.0.0.0 1337 sh -c 'exec ./bof_2 2>&1'