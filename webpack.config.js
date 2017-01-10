var webpack = require('webpack');

Elixir.webpack.mergeConfig({
  module: {
    loaders: [
      { test: require.resolve('jquery'), loader: 'expose?jQuery!expose?$' }
    ] 
  },
  plugins: [
    new webpack.ProvidePlugin({
    $: 'jquery',
    jQuery: 'jquery',
    'window.jQuery': 'jquery',
    'window.$' : 'jquery'
    })
  ]
});