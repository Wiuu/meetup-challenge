#!/bin/bash
docker-compose up -d --force-recreate --build --remove-orphans
docker-compose exec php chmod -R 777 /code/var/

RED='\033[1;31m'
NL='\n' # New Line
NC='\e[0m' # No Color

printf "${RED}
|----------------------------|
|  MeetVonq Api is Running on localhost:8080
|  Api documentation is running on localhost:8080/api/docs
|  Here is your access_token from OAuth2 to test the api:
|----------------------------|${NC}${NL}"
../../api/bin/console oauth:client:create