NFSimpleConfig
==============

A very simple configuration library that loads a list of files that each
return an array and merges them together.

Installation
------------

Using [Composer](http://getcomposer.org):

{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/nineteenfeet/NFSimpleConfig"
        }
    ],
    "require": {
        "nineteenfeet/nf-simple-config": "1.*",
    }
}

Alternatively, install manually.

Usage
-----

    $config = \NFSimpleConfig\Config::loadConfig(array(
            'path/to/config/config.php',
            'path/to/config/local.php',
        ));

