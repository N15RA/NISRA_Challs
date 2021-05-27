docker build -t test . \
&& docker run -p 1337:1337 \
-v `pwd`/share:/home/ctf:ro \
-v `pwd`/xinetd:/etc/xinetd.d/ctf:ro \
-v `pwd`/xinetd.conf:/etc/xinetd.conf:ro \
-d --rm --name test test