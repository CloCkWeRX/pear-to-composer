A quick command line helper to translate package 2.0+ PEAR files into a corresponding composer.json

Usage
-----
Go get composer
        $ curl -s http://getcomposer.org/installer | php

Assumes a package.xml in the current working directory

        $ php pear-to-composer.php > composer.json


Validation via composer

        $ php pear-to-composer.php > composer.json && php composer.phar validate 

Validation via composer with a dry-run
        $ php pear-to-composer.php > composer.json && php composer.phar validate && php composer.phar install --dry-run


TODO
----
 * Fully cover all package 2.0 elements
 * Work out the pecl deps, etc
 * Handle min, max version indicators
 * Consider detecting if there are phpunit flavoured tests and rendering require-dev bits
 * Consider adding the github hook if there's a repo, or to that in a pear-svn-git hook adding thing

