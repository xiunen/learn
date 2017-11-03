// set babel in entry file
require('babel-register')({
  plugins: [
    'transform-async-to-generator',
  ],
});

require('babel-polyfill');

require('./app');