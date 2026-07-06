<?php

namespace App\Http\Controllers;

class ResumeController extends Controller
{
    private const CV_PATH_EN = 'app/public/documents/cv/mamalikidou-cv-en.pdf';
    private const DOWNLOAD_NAME = 'Mamalikidou-CV.pdf';

    // Download the latest English version of the CV.
    public function download()
    {
        $path = storage_path(self::CV_PATH_EN);

        abort_unless(file_exists($path), 404);

        return response()->download(
            $path,
            self::DOWNLOAD_NAME
        );
    }
}
