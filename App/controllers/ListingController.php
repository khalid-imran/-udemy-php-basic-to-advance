<?php

namespace App\controllers;
use Framework\Database;
class ListingController
{
    protected $db;
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function index(): void
    {
        $listings = $this->db->query('SELECT * FROM listings LIMIT 6')->fetchAll();
        loadView('listings/index', ['listings' => $listings]);
    }

    public function create(): void
    {
        loadView('listings/create');
    }

    public function show($params): void
    {
        $id = $params['id'] ?? null;
        $params = ['id' => $id];
        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();
        if (!$listing) {
            ErrorController::notFound('Listing not found');
            return;
        }
        loadView('listings/show', ['listing' => $listing]);
    }
}