<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Concat;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:contacts.index')->only('index');
        $this->middleware('can:contacts.show')->only('show');
        $this->middleware('can:contacts.create')->only('create', 'store');
        $this->middleware('can:contacts.edit')->only('edit', 'update');
        $this->middleware('can:contacts.destroy')->only('destroy');
    }

    public function index()
    {
        //$contacts = Contact::all();
        //$contacts = Contact::paginate(6);
        $contacts = Contact::where("user_id", auth()->id())->paginate(6);
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        $title = 'Contact Register';
        $route = route('contacts.store');
        //$update = true;
        $textButton = 'Save';
        return view('contacts.create', compact('title', 'route', 'textButton'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,jpg,gif,png,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'name' => 'required|max:255'
        ]);
        $path = 'public/no-image.png';
        if( $request->hasFile('image') ){
            $path = $request->image->store('public');
        }
        $contact = Contact::create([
            'name' => $request->name,
            'image' => $path
        ]);
        $contact->save();
        return redirect()->route('contacts.index')->with('success', 'Contact save.');
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        $title = 'Contact Update';
        $route = route('contacts.update', ['contact' => $contact]);
        $update = true;
        $textButton = 'Save';
        return view('contacts.edit', compact('contact', 'title', 'route', 'update', 'textButton'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,jpg,gif,png,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'name' => 'required|max:255',
        ]);
        if( $request->hasFile('image') ){
            $contact->deleteImage();
            $path = $request->image->store('public');
        }
        else{
            $path = $contact->image;
        }
        $contact->fill([
            'name' => $request->name,
            'image' => $path
        ]);
        $contact->save();
        return redirect()->route('contacts.index')->with('success', 'Contact update.');
    }

    public function destroy(Contact $contact)
    {
        $contact->deleteImage(); // borrar la imagen asociada al contacto
        $contact->delete(); // borrar la tupla contacto
        return redirect()->route('contacts.index')->with('success', 'Contact delete.');
    }
}
