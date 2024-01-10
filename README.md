## Random Inventory Example

This tool is an http service which returns a random quantity value in json format by
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

The service will randomly return a 500 error to test
the client.

### There are two version of the service:

#### 1 . PHP version
This is implemented by using [FrameworkX](https://framework-x.org/)
The service can be run locally as a docker instance by run (from the root)

`docker composer up`

Then the service is available at:

`http://localhost:8080/inventory`

If PHP is installed locally it can be run also without docker just by run (from the root):

```
composer install
php app.php
``` 

This example uses the efficient built-in web server written in pure PHP.
Service is then available at 

`http://localhost:8080/inventory`

#### 1 . AWS Lambda version
The same service can be also implemented as an AWS Lambda Http service function
using Node JS.

```

const max = 100;

export const handler = async (event) => {

  let sku = event.queryStringParameters?.sku;

  if (!sku) {
    return {
      statusCode: 400,
      body: JSON.stringify('Sku not defined!'),
    };
  }
  
  let qty = getRandomInt();
  if (isOdd(qty)) {
    return {
      statusCode: 500,
      body: JSON.stringify('Lamba function error: this is a ramndom 500 error!'),
    };
  }
  
  return {
    statusCode: 200,
    body: JSON.stringify({
      sku: sku,
      qty: qty
    }),
  };
}

// return random int
function getRandomInt() {
  return Math.floor(Math.random() * Math.floor(max))
}

//check if the number is odd
function isOdd(number) {
  return (number & 1) === 1;
}
```
