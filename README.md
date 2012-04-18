A quick command line helper to translate package 2.0+ PEAR files into a corresponding composer.json

= Usage =
# Assumes a package.xml in the current working directory
$ php pear-to-composer.php > composer.json

# Validation via composer
$ curl -s http://getcomposer.org/installer | php
$ php pear-to-composer.php > composer.json && php composer.phar validate 

= TODO =
 * Fully cover all package 2.0 elements
 * Work out the PHP deps, pecl deps, etc
 * Handle min, max version indicators
 * Consider detecting if there are phpunit flavoured tests and rendering require-dev bits
 * Consider if channel = pear.php.net, automagically stating the github and pear URIs


