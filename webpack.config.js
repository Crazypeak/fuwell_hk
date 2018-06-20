const webpack = require('webpack');
const path = require("path");
const glob = require('glob');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');

const JSfileLink = {
    app: './src/app.js'
};

module.exports = {
    entry: JSfileLink,
    output: {
        path: path.resolve(__dirname, 'public/static/dist'),
        filename: '[name].bundle.js'
        //public/dist
    },
    module: {
        rules: [
            {test: /\.js$/, exclude: /node_modules/, loader: "babel-loader"},
            {
                test: /\.html$/,
                loader: 'html-loader'
            },
            {
                test: /\.css$/,
                loader: ExtractTextPlugin.extract({
                    fallback: 'style-loader',
                    use: [
                        {
                            loader: "css-loader",
                            // options:{
                            //     minimize: true
                            // }
                        }
                    ]
                })
            },
            {
                test: /\.(jpe?g|png|gif|svg)$/i,
                use: [
                    "file-loader?name=images/[name].[ext]",
                    //"file-loader?name=[name].[ext]&outputPath=images/&publicPath=images/",
                    {
                        loader: "image-webpack-loader",
                        options: {}
                    }]
            },
            {test: /\.(woff2?|svg)$/, loader: 'url-loader?limit=10000&name=fonts/[name].[ext]'},
            {test: /\.(ttf|eot)$/, loader: 'file-loader?name=fonts/[name].[ext]'},
        ]
    },
    plugins: [
        // new HtmlWebpackPlugin({
        //     hash: false,
        //     chunks: ['css'],
        //     filename: 'base.html',
        //     template: '/application/index/view/Public/base.html'
        // }),
        new ExtractTextPlugin({
            filename: '[name].css'
        })
    ],
    externals: {
        jquery: 'jQuery'
    }
};