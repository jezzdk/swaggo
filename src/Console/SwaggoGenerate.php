<?php

namespace Jezzdk\Swaggo\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Jezzdk\Swaggo\Facades\Swaggo;

class SwaggoGenerate extends Command
{
    protected $signature = 'swaggo:generate';

    protected $description = 'Generates the OpenAPI spec';

    public function handle()
    {
        $this->info('Generating...');

        if (!$this->configExists('swaggo.php')) {
            if ($this->confirm('Configuration file does not exist. Create it?', false)) {
                $this->publishConfiguration();
                $this->info('Done. Now change the configuration and run the command again.');
            } else {
                $this->error('You must configure this package in order for it to run properly.');
            }

            return;
        }

        $docsFile = config('swaggo.docs_path');

        if (!is_file($docsFile)) {
            $this->error('The docs file does not exist');
            return;
        }

        include_once $docsFile;

        $outputPath = config('swaggo.output_path');

        $this->info('Writing to ' . $outputPath);

        file_put_contents($outputPath, Swaggo::toJson());

        ray(Swaggo::toArray());

        $this->info('Finished!');
    }

    private function configExists($fileName)
    {
        return File::exists(config_path($fileName));
    }

    private function publishConfiguration($forcePublish = false)
    {
        $params = [
            '--provider' => "Jezzdk\Swaggo\SwaggoServiceProvider",
            '--tag' => "config"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }
}
