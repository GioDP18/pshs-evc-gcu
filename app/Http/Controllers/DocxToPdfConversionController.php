<?php

namespace App\Http\Controllers;

use App\Services\DocxToPdfConverter;
use Illuminate\Http\Request;
use \ConvertApi\ConvertApi;

class DocxToPdfConversionController extends Controller
{
    public function convert()
    {
        $docxFilePath = public_path('example.docx');
        ConvertApi::setApiSecret('1MDrmpYzrCkI1g04');
        $result = ConvertApi::convert('pdf', [
                'File' => $docxFilePath,
            ], 'doc'
        );
        $result->saveFiles(public_path('result/output.pdf'));

        // return response()->download($file)->deleteFileAfterSend(true);
    }
}
