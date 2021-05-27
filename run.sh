#!/bin/bash
cd /home/chall/NISRA_Challs
tmux new -s chall -d docker-compose up
docker run --name chall_index -v $(pwd)/index.html:/usr/share/nginx/html/index.html:ro -p 80:80 -d --rm nginx