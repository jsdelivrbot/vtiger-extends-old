#!/bin/bash

cd `dirname $0`

composer dump-autoload

git pull
git add .
git add *
git commit -m "sync"
git push