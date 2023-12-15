<?php

// Autoloader function
function myAutoloader($className) {
    $filename = __DIR__ . '/classes/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($filename)) {
        include $filename;
    }
}

// Register the autoloader function
spl_autoload_register('myAutoloader');

// Now, you can use classes without manual include/require statements
$obj = new MyNamespace\MyClass();
$obj->sayHello();

?>
