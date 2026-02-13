<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $projectsPath = resource_path('data/projects.json');
    $projects = file_exists($projectsPath) 
        ? json_decode(file_get_contents($projectsPath), true) 
        : [];
    
    return view('portfolio', ['projects' => $projects]);
});