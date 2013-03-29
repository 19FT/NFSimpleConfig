NFSimpleConfig
==============

A very simple configuration library that loads a list of files that each
return an array and merges them together.


Usage
-----

    $config = \NFSimpleConfig\Config::loadConfig(array(
            'path/to/config/config.php',
            'path/to/config/local.php',
        ));

