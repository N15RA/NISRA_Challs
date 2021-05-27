#!/bin/bash
echo "Secret Internal Dev Server: Here's your flag: NISRA{XXE_c4n_b3_p0w3rfu1!}" > /root/gbnXmsTACscCgLZ4huFB.php
nohup php -S localhost:6666 /root/gbnXmsTACscCgLZ4huFB.php &
apache2-foreground