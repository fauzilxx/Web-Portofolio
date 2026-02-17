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
        
        // Set APP_URL for relative paths
        putenv('APP_URL=');
        config(['app.url' => '']);
        
        // Export home page
        $this->info('Exporting home page...');
        
        // Manually call route
        $projectsPath = resource_path('data/projects.json');
        $allData = file_exists($projectsPath)
            ? json_decode(file_get_contents($projectsPath), true)
            : [];
        
        $projects = array_filter($allData, fn($item) => str_starts_with($item['id'], 'proj-'));
        $tools = array_filter($allData, fn($item) => str_starts_with($item['id'], 'tool-'));
        
        $html = view('home', [
            'projects' => $projects,
            'tools' => $tools
        ])->render();
        
        // Remove cache busting timestamps
        $html = preg_replace('/\?v=\d+/', '', $html);
        
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
            } else {
                $this->warn("✗ Directory not found: {$dir}/");
            }
        }
        
        // Copy robots.txt if exists
        if (File::exists(public_path('robots.txt'))) {
            File::copy(public_path('robots.txt'), $exportPath . '/robots.txt');
        }
        
        $this->info('✅ Static export completed at: ' . $exportPath);
        $this->info('');
        $this->info('Next steps:');
        $this->info('1. Test: Open public/dist/index.html in browser');
        $this->info('2. Deploy: git add public/dist && git commit -m "Update static export" && git push');
        
        return 0;
    }
}
