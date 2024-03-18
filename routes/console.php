<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('make:service-impl {param}', function ($param) {
    $serviceInterfaceDirectory = app_path("Http/Services");
    $serviceInterfacePath = "{$serviceInterfaceDirectory}/{$param}Service.php";

    if (!File::exists($serviceInterfaceDirectory)) {
        File::makeDirectory($serviceInterfaceDirectory, 0755, true);
    }

    $serviceInterfaceContent = "<?php\n\nnamespace App\Http\Services;\n\ninterface {$param}Service\n{\n";
    $serviceInterfaceContent .= "    //Define your methods here\n";
    $serviceInterfaceContent .= "}\n";
    File::put($serviceInterfacePath, $serviceInterfaceContent);

    $this->info("Service interface generated successfully: {$serviceInterfacePath}");


    $serviceInterfaceDirectory = app_path("Http/Implementations");
    $serviceInterfacePath = "{$serviceInterfaceDirectory}/{$param}ServiceImpl.php";

    if (!File::exists($serviceInterfaceDirectory)) {
        File::makeDirectory($serviceInterfaceDirectory, 0755, true);
    }

    $serviceInterfaceContent = "<?php\n\nnamespace App\Http\Implementations;\n\n\nuse App\Http\Services\\{$param}Service;\n\nClass {$param}ServiceImpl implements {$param}Service\n{\n";
    $serviceInterfaceContent .= "    //Define your methods here\n";
    $serviceInterfaceContent .= "}\n";
    File::put($serviceInterfacePath, $serviceInterfaceContent);

    $this->info("Service Implementation generated successfully: {$serviceInterfacePath}");
});
