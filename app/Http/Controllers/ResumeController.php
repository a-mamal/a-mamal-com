<?php

namespace App\Http\Controllers;

class ResumeController extends Controller
{
    private const CV_PATH_EN_DEVELOPMENT = 'app/public/documents/cv/development/mamalikidou-cv-en.pdf';
    private const CV_PATH_EN_PRODUCTION = 'app/public/documents/cv/production/mamalikidou-cv-en.pdf';
    private const DOWNLOAD_NAME = 'Mamalikidou-CV.pdf';

    // Download the placeholder CV locally and the private CV in production.
    public function download()
    {

        $cvPath = app()->environment('production')
            ? self::CV_PATH_EN_PRODUCTION
            : self::CV_PATH_EN_DEVELOPMENT;

        $path = storage_path($cvPath);

        abort_unless(file_exists($path), 404);

        // Keep the downloaded filename consistent across environments
        return response()->download(
            $path,
            self::DOWNLOAD_NAME
        );
    }
}