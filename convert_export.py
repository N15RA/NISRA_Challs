#!/usr/bin/env python3
import yaml
import os
import shutil
import tarfile
from pathlib import Path

os.mkdir('challs')

archive = tarfile.open('export.tar.gz', 'r:gz')
archive.extractall(path='.')

with open('export.yaml', 'r') as f:
    li = f.read().split('---\n')
    li.pop(0)

    for i in li:
        d = yaml.load(i)
        chall_dir = 'challs/'+d['name']

        os.mkdir(chall_dir)

        # Copy the files
        files = d.get('files', None)
        if isinstance(files, list):
            os.mkdir(chall_dir + '/files')

            for idx, file in enumerate(files):
                shutil.copy(file, chall_dir + '/files')
                d['files'][idx] = 'files/' + Path(file).name

        with open('{}/info.yaml'.format(chall_dir), 'w') as f:
            f.write(yaml.dump(d))

shutil.rmtree('./export.d')
os.unlink('./export.yaml')
