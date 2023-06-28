<?php

namespace Nalcom\Adminify\Commands;

use Illuminate\Console\Command;

class PrintResourceFileList extends Command
{

    protected $signature = 'paths:print';

    protected $description = 'prints all files to console to put in vite config for small bundle';

    public function handle(): int
    {
        $this->listFolderFiles(resource_path('js'));
        $this->listFolderFiles(resource_path('css'));

        return self::SUCCESS;
    }


    private function listFolderFiles($dir)
    {
        $ffs = scandir($dir);

        unset($ffs[array_search('.', $ffs, true)]);
        unset($ffs[array_search('..', $ffs, true)]);

        if (count($ffs) < 1) {
            return;
        }

        foreach ($ffs as $ff) {

            if (is_dir($dir . '/' . $ff)) {
                $this->listFolderFiles($dir . '/' . $ff);
            }

            $fullPath = $dir . '/' . $ff;

            $path = explode('resources', $fullPath);
            $pathFromResources = 'resources' . end($path);
            if (str_contains($pathFromResources, '.')) {
                $this->info("'" . str_replace('\\', '/', $pathFromResources) . "',");
            }
        }
    }
}
