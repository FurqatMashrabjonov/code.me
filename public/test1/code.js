const fs = require('fs');
const data = fs.readFileSync(__dirname + '/input.txt', 'utf8');

const [a, b] = data.split(' ').map(item => parseInt(item));
fs.writeFileSync(__dirname + '/output.txt', `${a+b}`, 'utf8');
