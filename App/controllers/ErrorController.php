<?php

namespace App\controllers;
class ErrorController
{
    public function __construct()
    {

    }

    public static function notFound($message = 'Resource not found'): void
    {
        http_response_code(404);
        loadView('error', [
            'status' => 404,
            'message' => $message,
        ]);
    }
    public static function unauthorised($message = 'You are not authorised to view this resource'): void
    {
        http_response_code(403);
        loadView('error', [
            'status' => 403,
            'message' => $message,
        ]);
    }
}