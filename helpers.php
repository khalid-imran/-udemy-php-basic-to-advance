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

function loadView($name)
{
    $viewPath = basePath('views/' . $name . '.view.php');
    if (file_exists($viewPath)) {
        require $viewPath;
    } else {
        echo 'View does not exist';
    }
}

function loadPartial($name)
{
    $viewPath = basePath('views/partials/' . $name . '.view.php');
    if (file_exists($viewPath)) {
        require $viewPath;
    } else {
        echo 'View does not exist';
    }
}