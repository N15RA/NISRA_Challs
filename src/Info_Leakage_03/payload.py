import string
import random
import os

for i in range(40):
    text = ''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(10))
    with open('{}.txt'.format(text) , 'w') as f:
        f.write(text)
    
    os.system("git add *.txt && git commit -m '{}' && sleep 0.5".format("add random file " + text + ".txt"))