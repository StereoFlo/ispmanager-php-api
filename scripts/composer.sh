#!/usr/bin/env bash

mkdir -p $HOME/.composer

sudo docker run --rm --interactive --tty \
    --user $(id -u):$(id -g) \
    --volume $PWD:/app \
    --volume ${COMPOSER_HOME:-$HOME/.composer}:/tmp \
    composer $@
