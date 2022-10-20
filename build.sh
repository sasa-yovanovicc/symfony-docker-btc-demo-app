#!/bin/bash
# Build Script
# Sasa Jovanovic
# 2022-10-20

export COMPOSE_DOCKER_CLI_BUILD=1
export DOCKER_BUILDKIT=1

docker compose build --pull --no-cache

docker compose up -d

until [ -d ./src ]
do
     sleep 5
done

until [ -d ./vendor ]
do
     sleep 5
done

until [ ! -d ./tmp ]
do
     sleep 5
done

docker compose run --rm php composer require symfony/yaml
docker compose run --rm php composer require symfony/http-client
docker compose run --rm php composer require symfony/twig-bundle
docker compose run --rm php composer require symfony/asset

if [ -d ./custom ]; then
  cp -r ./custom/* ./
fi

docker compose stop
docker compose up -d

sleep 5

echo "All OK. Visit http://localhost:8910"
