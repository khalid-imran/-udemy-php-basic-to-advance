<?php
/**
 * Get the base path
 *
 * @param string $path
 * @return string
 */
function basePath($path = '')
{
    return __DIR__ . '/' . $path;
}

/**
 * Load a view
 *
 * @param string $name
 * @return void
*/
function loadView($name): void
{
    $viewPath = basePath('views/' . $name . '.view.php');
    if (file_exists($viewPath)) {
        require $viewPath;
    } else {
        echo 'View does not exist';
    }
}

/**
 * Load a partial view
 *
 * @param string $name
 * @return void
*/
function loadPartial($name): void
{
    $viewPath = basePath('views/partials/' . $name . '.view.php');
    if (file_exists($viewPath)) {
        require $viewPath;
    } else {
        echo 'View does not exist';
    }
}

/**
 * Inspect a variable
 *
 * @param mixed $value
 * @return void
*/
function inspect($value): void
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

/**
 * Inspect a variable and die
 *
 * @param mixed $value
 * @return void
*/
function inspectAndDie($value): void
{
    echo '<pre>';
    die(var_dump($value));
    echo '</pre>';
}

