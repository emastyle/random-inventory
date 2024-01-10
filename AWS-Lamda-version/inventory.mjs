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
      body: JSON.stringify('Lamba function error: this is a random 500 error!'),
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