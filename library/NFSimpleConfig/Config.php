<?php
/**
 * NFSimpleConfig
 *
 * @link      https://github.com/nineteenfeet/NFSimpleConfig for the canonical source repository
 * @copyright Copyright (c) 2013 Nineteen Feet Limited (http://www.nineteenfeet.com) 
 * @license   http://nineteenfeet.com/license/new-bsd
 *
 * Very simple configuration: merges a list of config files that each return an array
 *
 */

namespace NFSimpleConfig;


class Config
{
    /**
     * @var array
     */
    static $config;

    /**
     * Load a list of config files that each return array and merge them
     *
     * @param array $files List of config files
     *
     * @return void
     */
    static function loadConfig(array $files)
    {
        $config = array();

        foreach ($files as $file) {
            if (file_exists($file)) {
                $a = include $file;
                if (is_array($a)) {
                    $config = static::mergeArrays($config, $a);
                }
            }
        }

        static::$config = $config;

        return $config;
    }

    /**
     * Retrieve merged configuration array
     *
     * @return array
     */
    static function getConfig()
    {
        return static::$config;
    }

    /**
     * Merge two arrays together - This method is lifted from Zend\StdLib
     *
     * If an integer key exists in both arrays, the value from the second array
     * will be appended the the first array. If both values are arrays, they
     * are merged together, else the value of the second array overwrites the
     * one of the first array.
     *
     * @param  array $a
     * @param  array $b
     * 
     * @return array
     */
    public static function mergeArrays(array $a, array $b)
    {
        foreach ($b as $key => $value) {
            if (array_key_exists($key, $a)) {
                if (is_int($key)) {
                    $a[] = $value;
                } elseif (is_array($value) && is_array($a[$key])) {
                    $a[$key] = self::mergeArrays($a[$key], $value);
                } else {
                    $a[$key] = $value;
                }
            } else {
                $a[$key] = $value;
            }
        }

        return $a;
    }

}
