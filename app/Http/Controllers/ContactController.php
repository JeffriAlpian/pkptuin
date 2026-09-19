<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'asal_instansi' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'file_surat' => 'required|mimes:pdf|max:5120', // max 5MB
        ]);

        if ($request->hasFile('file_surat')) {
            $path = $request->file('file_surat')->store('contacts', 'public');
            $validated['file_surat'] = '/storage/' . $path;
        }

        Contact::create($validated);

        return back()->with('contact_success', 'Surat berhasil dikirim. Kami akan segera menindaklanjuti.');
    }
}
