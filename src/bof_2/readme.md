# bof_2

> by roy4801

## spec

```
[*] 'bof_2'
    Arch:     i386-32-little
    RELRO:    Partial RELRO
    Stack:    No canary found
    NX:       NX disabled
    PIE:      No PIE (0x8048000)
    RWX:      Has RWX segments
```

> ASLR is disabled

## Details

`entry.sh` will disable the ASLR first and start to serve the problem exe.

> The stack address is different depends on the platfom even if the ASLR is disabled.