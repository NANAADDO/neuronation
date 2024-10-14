#!/bin/bash

app_path=appservice
app_directory=/appservice/

echo "****************************"
echo "** Building Docker Images ***"
echo "****************************"


docker-compose  build  && docker-compose up -d

echo "** Creating .ENV File ***"
docker exec -t $app_path bash  -c  "${app_directory}; cp .env.example .env"
echo "** Running Composer Install ***"
docker exec -t $app_path bash  -c  "${app_directory}; composer install"
echo "** Installing Dependencies ***"
docker exec -t $app_path bash  -c  "${app_directory}; composer require laravel/lumen-framework"
docker exec -t $app_path bash  -c  "${app_directory}; composer require maxsky/lumen-app-key-generator"
docker exec -t $app_path bash  -c  "${app_directory}; composer require symfony/serializer"
docker exec -t $app_path bash  -c  "${app_directory}; composer require predis/predis"
docker exec -t $app_path bash  -c  "${app_directory};php artisan jwt:secret"
docker exec -t $app_path bash  -c  "${app_directory}; php artisan migrate"
docker exec -t $app_path bash  -c  "${app_directory}; php artisan db:seed"
docker exec -t $app_path bash  -c  "${app_directory}; composer dump-autoload;"