<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use File;

class TemplateController extends Controller
{
    public function index(){
        $filePath = File::files(public_path().'/assets/docs'); // Lokasi file Word
        // Load file Word
        $phpWord = IOFactory::load($filePath[1]);

        // Render menjadi HTML
        $htmlWriter = IOFactory::createWriter($phpWord, 'HTML');
        ob_start();
        $htmlWriter->save('php://output');
        $htmlContent = ob_get_clean();

        // Tampilkan di view Laravel
        return  $htmlContent
        ;
    }

    public function ahliWaris(){
        return View('templateView');
    }
}
