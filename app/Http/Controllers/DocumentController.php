<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\View\View;

class DocumentController extends Controller
{
    /**
     * Display a listing of documents.
     */
    public function index(): View
    {
        $documents = Document::latest()->paginate(10);

        return view('dokumen.index', [
            'documents' => $documents,
        ]);
    }
}
