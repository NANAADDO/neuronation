

# Neuronation Project Details & Installation  Guide

Contents
========

* [Design Tools](#design-tools)
* [Dummy](#dumm-data)
* [Installation](#installation)
* [Coding Task Details](#coding-task-details)



## Design Tools

##### Stack
* Language:Php:8+
* framework:Lumen:10
* Database:Mysql:5.7
*  Cache:Redis
* 
##### Code Architecture
* Patten:Solid
* framework:Repository
* Authentication:JWT Token
* 
##### DevOps
* Docker for containerization
* Docker compose for cluster Management
* Jenkins for Automation
* 
##### Cloud
* AWS Litesail instance for Deployment
* AWS S3 bucket for Database backup storage

#### Future Improvement
* Complete CI/CD Automation for deployment
* Develop Health status for New API'S
* Database Tuning
* Complete Automated S3 BACKUP OF DB
* ADD SWAGGER FOR DOCUMENTATION
* CODE LINTING

#### Testing Tool
* Postman 

## DATABASE SCHEMA
![Diagram](https://github.com/NANAADDO/neuronation/blob/master/db%20schema.png)


##### Token Generation

* User Account:[Username:brainy_samuel,Password:password.123]


####  CI/CD Jenkins Login Account
* Username:samuel_dev
* password:Elizabeth.1995
* Local Env. Url http://0.0.0.0:5000/

## AWS & Local Installation TESTING

### 1. AWS DEPLOYED TEST INSTANCE
*You can test the endpoints directly from aws instance without stress
#### Download JSON File

[Download API Postman Collection](https://raw.githubusercontent.com/NANAADDO/neuronation/master/ApispostmanTest.postman_collection.json)


##### NB 

### 2. LOCAL ENVIRONMENT SETUP
* Make sure you have docker and docker-compose installed on your local environment.
* All local Env. commands are executed on terminal


## Local Env Test
#### Step 1:

Clone code repository to your local environment

```shell
git clone https://github.com/NANAADDO/neuronation.git
```

#### Step 2:

Change directory into the clone repository folder

```shell
cd neuronation
```

#### Step 3:


The Build process contains two bash script for different containers

### Method 1
This bash script build and start the docker containers with no jenkins image which uses the docker-compose.yml file

```shell
*Execute the shell script with the command below 

 ./build-containers.sh
```

### Method 2
This shell script runs  the bash script with jenkins in the docker-compose2.yml file.
This build contains the automation tool for s3 database backup and for CI/CD pipeline

```shell
*Execute the shell script with the command below 

sudo chmod +x jenkins-script/db-backup-s3.sh

sudo chmod +x build-containers_with_jenkins.sh
```

```shell
**Run the shell script to start the docker build process

 sudo ./build-containers_with_jenkins.sh
```
### Shell script  execute below commands

```shell
 #!/bin/bash
 
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




```
### Step 4:

* docker by default serves all local containers  on [http://0.0.0.0/api/routename](http://0.0.0.0/api).
* docker deployed on AWS serves all API endpoint on   [http://35.158.204.40/api/routename](http://35.158.204.40/api).

#
## Coding Task Details

#### RUN PHP UNIT:
```shell
**Run the shell script with the following command

 ./unit-test.sh
 ```


#### NB
All  Restful Apis  where designed  and returns response  in json

*Postman
### Token Generation EndPoint:

##### End Point

*AWS Instance

Endpoint:"http://35.158.204.40/api/auth/login"


*Local Endpoint:
"http://0.0.0.0/api/api/auth/login"


```shell
http verb:"GET"

 headers:{
 Accept:application/json
 }

* Body

{
"username":"brainy_samuel",
"password":"password.123"

    
}

 
```
*Sample Success response
```shell
{
    "data": {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMC4wLjAuMC9hcGkvYXV0aC9sb2d
        pbiIsImlhdCI6MTcyODg3MTM5MCwiZXhwIjoxNzI4ODc0OTkwLCJuYmYiOjE3Mjg4NzEzOTAsImp0aSI6IkNmRWN1
        QW9xaTlBM1hDTW4iLCJzdWIiOiIxIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.ZMlVYPp8XUAi3P77M9GiYQPKBm-uYx5beG3xwH4MRls"
    },
    "Success": true,
    "statuscode": 200
}

```


### Api 1: Users/{$userID}/Session/History:

```shell
HTTP VERB:"GET"

*AWS Instance
*Endpoint:
"http://0.0.0.0/api/users/1/session/history"


*AWS Instance
Endpoint:"http://35.158.204.40/api/users/1/session/history"

payload={
    
}

 headers:{
 "Accept":"application/json",
 "Authorization":"Bearer tokenID"
 }



* Sample response
```shell

{
    "history": [
        {
            "score": "64",
            "date": 1728294003
        },
        {
            "score": "90",
            "date": 1727862003
        },
        {
            "score": "146",
            "date": 1726566003
        },
        {
            "score": "84",
            "date": 1726566003
        },
        {
            "score": "72",
            "date": 1726479603
        },
        {
            "score": "63",
            "date": 1726306803
        },
        {
            "score": "61",
            "date": 1725788403
        },
        {
            "score": "83",
            "date": 1725442803
        },
        {
            "score": "57",
            "date": 1725183603
        },
        {
            "score": "160",
            "date": 1725183603
        },
        {
            "score": "139",
            "date": 1725097203
        },
        {
            "score": "172",
            "date": 1724751603
        }
    ],
    "Success": true,
    "statuscode": 200
}
```



### Api 2: users/1/Latest-Session-Category:

```shell
HTTP VERB:"GET"

*AWS Instance
*Endpoint:
"http://0.0.0.0/api/users/1/latest-session-category"

*AWS Instance
Endpoint:"http://35.158.204.40/api/users/1/latest-session-category"

payload={
    
}

 headers:{
 "Accept":"application/json",
 "Authorization":"Bearer tokenID"
 }


```
* Sample response

```shell
{
    "data": [
        {
            "name": "memory"
        }
    ],
    "Success": true,
    "statuscode": 200
```



