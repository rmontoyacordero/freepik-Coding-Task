<?php

class ConfigLoader
{
    private static array $config = [];

    public static function getConfig()
    {
        if (!self::$config) {
            if (file_exists("{$GLOBALS['rootDir']}/config/config.php")) {
                self::$config = include("{$GLOBALS['rootDir']}/config/config.php");
            } else {
                self::$config = include("{$GLOBALS['rootDir']}/config/{$_SERVER['PHP_ENV']}.php");
            }

        }

        return self::$config;
    }
}
