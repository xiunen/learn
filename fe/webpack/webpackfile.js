var webpack = require("webpack");
module.exports = {
    entry: './index.js',
    output: {
        filename: 'bundle.js',
        path: './dist'
    },
    plugins: [
        new webpack.optimize.UglifyJsPlugin({ minimize: true })
    ]
};