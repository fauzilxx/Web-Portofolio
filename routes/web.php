<?php

use Illuminate\Support\Facades\Route;

// Landing Page Route
Route::get('/', function () {
    $projectsPath = resource_path('data/projects.json');
    $allData = file_exists($projectsPath)
        ? json_decode(file_get_contents($projectsPath), true)
        : [];
    
    $projects = array_filter($allData, fn($item) => str_starts_with($item['id'], 'proj-'));
    $tools = array_filter($allData, fn($item) => str_starts_with($item['id'], 'tool-'));
    
    return view('home', [
        'projects' => $projects,
        'tools' => $tools
    ]);
})->name('home');