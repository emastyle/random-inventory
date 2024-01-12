## Random Inventory Example

This tool is just an exercise for a http service which returns a random quantity value in json format by
providing a SKU as get parameter:

call:

```//<SERVICE>?sku=MYSKU```

Response:

```
{
  sku: MYSKU,
  qty: XXX
}
```

The service will randomly return a 500 error to make some tests with the client.

### There are two version of the service:

#### 1 . PHP version
Implemented by using the lightweight [FrameworkX](https://framework-x.org/)

#### Run service with Docker
The service can run in a docker container just by following this command (from the root):

`docker composer up`

Then the service will be available at:

`http://localhost:8080/inventory`

#### Run service without Docker but PHP locally
If PHP 8.2 is installed locally the service can be also run without using docker by these commands (from the root):

```
composer install
php app.php
``` 

This example uses the efficient built-in web server written in pure PHP from the framework.
Service will be then available at

`http://localhost:8080/inventory`

#### 2 . AWS Lambda version
The same service has also been implemented in javascript and can be used as an AWS Lambda Http service function
using Node JS.
The code is available in the folder `AWS-Lambda-service`
More about AWS Lambda https://aws.amazon.com/pm/lambda/
