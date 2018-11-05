const webpack = require('webpack');
const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const VueLoaderPlugin = require('vue-loader/lib/plugin');

module.exports = function(env) {

	return {
		mode: env.NODE_ENV,
	  	entry: path.resolve('./dev/main.js'),
	  	output: {
			filename: 'script.js',
			chunkFilename: 'vendor.js',
	    	path: path.resolve(__dirname)
	  	},
		resolve: {
			extensions:['*', '.js', ".json", ".vue", ".scss"],
			alias: {
				vue: 'vue/dist/vue.js'
			}
		},
	  	module: {
	  		rules: [
	    		{ 
	    			test: /\.js$/, 
	    			exclude: /node_modules/, 
	    			use: {
						loader: "babel-loader"
					}
	    		},
		      	{
			        test: /\.vue$/,
			        loader: 'vue-loader'
		      	},    		
	    		{
	    			test: /\.scss$/,
		            use: [
		                MiniCssExtractPlugin.loader,
		                {
		                	loader: "css-loader", // translates CSS into CommonJS
		                	options: {
		                		minimize: true,
	      						url: false,
	      						sourceMap: true,
		                	}
		                },
		               { 
		               		loader: "sass-loader", // compiles Sass to CSS 
		               		options: {
		               			sourceMap: true,
		               		}
		               	}, 
		            ]
	    		}
	  		]
		},
	    optimization:{
			splitChunks: {
			    cacheGroups: {
			        vendor: {
			            test: /[\\/]node_modules[\\/]/,
			            name: "vendors",
			            chunks: "all"
			        }
			    }
			}

	    },	
	    plugins: [
	        new MiniCssExtractPlugin({
	            // Options similar to the same options in webpackOptions.output
	            // both options are optional
	            filename: "style.css"
	        }),
		    new webpack.SourceMapDevToolPlugin({
		      	filename: '[file].map',
		      	exclude: ['vendor.js']
		    }),      
	        new UglifyJsPlugin({
	        	sourceMap: true,
	        }),
	        new VueLoaderPlugin(),
	    ]			
	}
		
};