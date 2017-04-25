fetch = require('node-fetch');

fetch('https://newsapi.org/v1/articles?source=the-next-web&sortBy=latest&apiKey=4ac0ec9992af4a078cc87bd6fd651741', {
  method: 'POST',
  headers: {'Content-Type': 'application/json'},
  body: '{}'
}).then(response => {
  return response.json();
}).catch(err => {console.log(err);});
