<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(15);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function markAsRead(Contact $contact)
    {
        if ($contact->status === 'unread') {
            $contact->update(['status' => 'read']);
        }
        return back()->with('success', 'Status surat diperbarui menjadi dibaca.');
    }

    public function markAsReplied(Contact $contact)
    {
        $contact->update(['status' => 'replied']);
        return back()->with('success', 'Status surat diperbarui menjadi dibalas.');
    }

    public function destroy(Contact $contact)
    {
        if ($contact->file_surat) {
            $path = str_replace('/storage/', '', $contact->file_surat);
            Storage::disk('public')->delete($path);
        }
        $contact->delete();
        return back()->with('success', 'Surat berhasil dihapus.');
    }
}
