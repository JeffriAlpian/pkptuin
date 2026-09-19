<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Document;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::latest()->paginate(10);
        return view('admin.documents.index', compact('documents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip|max:10240' // max 10MB
        ]);

        $file = $request->file('file');
        // Simpan file dengan nama aslinya atau generate hash
        // Lebih baik pakai nama asli agar URL-nya bagus
        $filename = time() . '_' . Str::random(16) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('documents', $filename, 'public');

        Document::create([
            'title' => $request->title,
            'file_path' => '/storage/' . $path,
            'file_type' => $file->getClientOriginalExtension(),
            'file_size' => $file->getSize()
        ]);

        return back()->with('success', 'Dokumen berhasil diupload.');
    }

    public function destroy(Document $document)
    {
        // Hapus file fisik
        $path = str_replace('/storage/', '', $document->file_path);
        Storage::disk('public')->delete($path);
        
        $document->delete();
        return back()->with('success', 'Dokumen berhasil dihapus.');
    }
}
