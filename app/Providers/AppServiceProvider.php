<?php

// app/Providers/AppServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Ajout de la validation pour la taille maximale des fichiers
        $maxUploadSize = env('FILE_UPLOAD_MAX_SIZE', 102400); // Default to 100MB (in KB)

        Validator::extend('max_file_size', function ($attribute, $value, $parameters, $validator) use ($maxUploadSize) {
            return $value->getSize() <= $maxUploadSize * 1024; // Convert KB to bytes
        }, 'The file size must not exceed ' . $maxUploadSize . ' KB.');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
