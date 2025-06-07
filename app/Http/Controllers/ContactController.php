<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

        // Simpan data
        Contact::create($request->only('name', 'email', 'message'));

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Pesan Anda telah terkirim!');
    }

    public function index()
    {
        $contacts = \App\Models\Contact::latest()->paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function destroy($id)
    {
        $contact = \App\Models\Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Pesan berhasil dihapus.');
    }

}
