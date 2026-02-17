<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ExportStatic extends Command
{
    protected $signature = 'export:static';
    protected $description = 'Export Laravel app to static HTML';

    public function handle()
    {
        $this->info('Exporting static site...');
        
        $exportPath = public_path('dist');
        
        // Clean export directory
        if (File::exists($exportPath)) {
            File::deleteDirectory($exportPath);
        }
        File::makeDirectory($exportPath, 0755, true);
        
        // Export home page
        $this->info('Exporting home page...');
        $html = $this->fetchRoute('/');
        
        File::put($exportPath . '/index.html', $html);
        
        // Copy all assets
        $this->info('Copying assets...');
        
        $assetDirs = ['build', 'css', 'js', 'images'];
        foreach ($assetDirs as $dir) {
            $source = public_path($dir);
            $dest = $exportPath . '/' . $dir;
            
            if (File::exists($source)) {
                File::copyDirectory($source, $dest);
                $this->info("✓ Copied {$dir}/");
            }
        }
        
        // Copy data directory (JSON files)
        $this->info('Copying data files...');
        $dataSource = resource_path('data');
        $dataDest = $exportPath . '/data';
        
        if (File::exists($dataSource)) {
            File::copyDirectory($dataSource, $dataDest);
            $this->info('✓ Copied data/');
        }
        
        // Copy robots.txt if exists
        if (File::exists(public_path('robots.txt'))) {
            File::copy(public_path('robots.txt'), $exportPath . '/robots.txt');
        }
        
        $this->info('✅ Static export completed at: ' . $exportPath);
        
        return 0;
    }
    
    private function fetchRoute($path)
    {
        // Set APP_URL to empty string for relative paths
        config(['app.url' => '']);
        
        $app = app();
        $request = \Illuminate\Http\Request::create($path, 'GET');
        $response = $app->handle($request);
        
        $html = $response->getContent();
        
        // Replace any remaining localhost references with relative paths
        $html = preg_replace('#http://localhost/([^"\']+)#', '$1', $html);
        
        return $html;
    }
}
