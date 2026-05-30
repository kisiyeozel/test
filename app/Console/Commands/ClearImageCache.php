<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ImageService;

class ClearImageCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:clear-cache';

    protected $description = 'Clear generated image thumbnails cache';

    public function handle()
    {
        \App\Services\ImageService::clearCache();
        $this->info('Image cache cleared successfully.');
    }
}
