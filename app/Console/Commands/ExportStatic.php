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
        
        // Fix all asset paths - remove leading slash for relative paths
        $html = preg_replace('/href="\/([^"]+)"/', 'href="$1"', $html);
        $html = preg_replace('/src="\/([^"]+)"/', 'src="$1"', $html);
        
        // Keep external URLs intact
        $html = str_replace('href="https:', 'href="/https:', $html);
        $html = str_replace('src="https:', 'src="/https:', $html);
        $html = str_replace('href="http:', 'href="/http:', $html);
        $html = str_replace('src="http:', 'src="/http:', $html);
        $html = str_replace('href="/https:', 'href="https:', $html);
        $html = str_replace('src="/https:', 'src="https:', $html);
        $html = str_replace('href="/http:', 'href="http:', $html);
        $html = str_replace('src="/http:', 'src="http:', $html);
        
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
        $app = app();
        $request = \Illuminate\Http\Request::create($path, 'GET');
        $response = $app->handle($request);
        
        return $response->getContent();
    }
}
