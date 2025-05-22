<?php

namespace App\Http\Controllers;

use App\Models\UserContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index(Request $request) 
    {
        $search = $request->get('search', '');

        $contacts = UserContact::query()
                        ->where('user_id', Auth::user()->id)
                        ->when(!empty($search), function($query) use($search) {
                            $query
                            ->whereAny([
                                'name',
                                'company',
                                'email',
                            ], 'like', "%$search%");
                        })
                        ->get();

        return view($request->ajax() ? 'contacts.search' : 'contacts.view', [
            'contacts' => $contacts,
        ]);
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        UserContact::updateOrCreate([
            'id'        => $request->contact_id,
        ],[
            'user_id'   => Auth::user()->id,
            'name'      => $request->contact_name,
            'company'   => $request->contact_company,
            'phone'     => $request->contact_phone,
            'email'     => $request->contact_email,
        ]);

        return redirect()->intended(route('contacts.index', absolute: false));
    }

    public function destroy($id) 
    {
        UserContact::find($id)->delete();
    }

    public function show($id)
    {
        return view('contacts.create', [
            'contact' => UserContact::find($id)
        ]);
    }
}