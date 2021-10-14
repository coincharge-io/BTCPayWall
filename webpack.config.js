const defaultConfig = require('@wordpress/scripts/config/webpack.config')
const path = require('path')

module.exports = {
  ...defaultConfig,
  entry: {
    index: path.join(__dirname, 'blocks/index.js')
  },
  output: {
    filename: '[name].js',
    path: path.join(__dirname, 'assets/dist/js')
  }
}
