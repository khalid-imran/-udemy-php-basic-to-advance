<?php

/**
 * Get the base path
 *
 * @param string $path
 * @return string
 */
function basePath(string $path = ''): string
{
    return __DIR__ . '/' . $path;
}

/**
 * Load a view
 *
 * @param string $name
 * @param array $data
 * @return void
 */
function loadView(string $name, array $data = []): void
{
    $viewPath = basePath('App/views/' . $name . '.view.php');
    if (file_exists($viewPath)) {
        extract($data);
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
function loadPartial(string $name): void
{
    $viewPath = basePath('App/views/partials/' . $name . '.view.php');
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
function inspect(mixed $value): void
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
function inspectAndDie(mixed $value): void
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

/**
 * Format a salary
 *
 * @param string $salary
 * @return string
 */
function formatSalary(string $salary): string
{
    return '$' . number_format($salary);
}