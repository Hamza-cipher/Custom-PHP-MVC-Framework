<?php
/*
 *   Autoloading function to autoload files
 *   This function accepts a parameter with class name
 */
function autoload($class)
{

    /* DIR = __DIR__  AND  DS = 'Directory Separator', These are set in config.php */
    $class_file = DIR . DS . $class . '.php';
    if (file_exists($class_file)) {
        require_once $class_file;
    } else {
        foreach (unserialize(AUTOLOAD_CLASSES) as $path) {
            $class_file = $path . DS . $class . '.php';
            if (file_exists($class_file)) {
                require_once $class_file;
            }
        }
    }
}

/* spl_autoload_register is a php function to load classes
 */
spl_autoload_register('autoload');
