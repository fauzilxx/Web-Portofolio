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
        
        // Fix asset paths for root deployment
        $html = str_replace('href="/build/', 'href="build/', $html);
        $html = str_replace('src="/build/', 'src="build/', $html);
        $html = str_replace('href="/css/', 'href="css/', $html);
        $html = str_replace('src="/js/', 'src="js/', $html);
        $html = str_replace('src="/images/', 'src="images/', $html);
        
        File::put($exportPath . '/index.html', $html);
        
        // Copy assets
        $this->info('Copying assets...');
        
        $assetDirs = ['build', 'css', 'js', 'images'];
        foreach ($assetDirs as $dir) {
            $source = public_path($dir);
            $dest = $exportPath . '/' . $dir;
            
            if (File::exists($source)) {
                File::copyDirectory($source, $dest);
            }
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
