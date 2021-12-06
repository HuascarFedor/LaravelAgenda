<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:contacts.create')->only('store'); 
        $this->middleware('can:contacts.destroy')->only('destroy');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'max:30',
            'number' => 'required|max:20',
            'contact_id' => 'required'
        ]);
        if( $request->description != "" ){
            $phone = Phone::create([
                'description' => $request->description,
                'number' => $request->number,
                'contact_id' => $request->contact_id,
            ]);
        }
        else{
            $phone = Phone::create([
                'number' => $request->number,
                'contact_id' => $request->contact_id,
            ]);
        }
        $phone->save();
        return back()->with('success', 'Phone save.');
    }

    public function destroy(Phone $phone)
    {
        $phone->delete();
        return back()->with('success', __('Phone delete.'));
    }
}
