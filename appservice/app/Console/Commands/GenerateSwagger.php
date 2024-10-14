<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use OpenApi\Generator;

class GenerateSwagger extends Command
{
    protected $signature = 'swagger:generate';
    protected $description = 'Generate Swagger JSON documentation';

    public function handle()
    {
        // Modify the base path to scan only the Controllers directory
        $swagger = \OpenApi\Generator::scan([base_path('app/Http/Controllers')]);

        // Save the Swagger documentation to the public directory
        file_put_contents(base_path('public/swagger.json'), $swagger->toJson());

        $this->info('Swagger documentation generated successfully.');
    }
}
