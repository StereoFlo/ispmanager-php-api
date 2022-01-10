#!/usr/bin/env bash

php_tag='7.4.14-cli-alpine3.11'

sudo docker run --rm -it \
    --user $(id -u):$(id -g) \
    --volume $PWD:/app \
    -w "/app" \
    php:${php_tag} bin/robo.phar $@
