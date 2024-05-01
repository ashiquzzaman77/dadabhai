<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //All Contact
    public function AllContact()
    {
        $contacts = Contact::all();
        return view('admin.pages.contact.all_contact', compact('contacts'));
    }

    //Store Contact
    public function StoreContact(Request $request)
    {
        $validator = $request->validate(

            [
                'name' => 'required|max:120',
                'email' => 'required|email',
                'phone' => 'required|min:11|numeric',
                'message' => 'required',
            ],

            [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'phone.required' => 'Phone is required',
                'message.required' => 'Message is required',
            ],
        );

        // MSG-240324-2

        $typePrefix = 'MSG';

        $today = date('dmy');

        $lastCode = Contact::where('code', 'like', $typePrefix . '-' . $today . '%')
            ->orderBy('id', 'desc')
            ->first();

        $newNumber = $lastCode ? (int) explode('-', $lastCode->code)[2] + 1 : 1;

        $code = $typePrefix . '-' . $today . '-' . $newNumber;

        if ($validator) {

            Contact::insert([

                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'message' => $request->message,
                'code' => $code,
                'ip_address' => $request->ip_address,

            ]);

        }

        toastr()->success('Contact Created Successfully');
        return redirect()->route('all.contact');

    }

    //Store Contact
    public function UpdateContact(Request $request)
    {
        $uid = $request->id;

        $validator = $request->validate(

            [
                'name' => 'required|max:120',
                'email' => 'required|email',
                'phone' => 'required|min:11|numeric',
                'message' => 'required',
            ],

            [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'phone.required' => 'Phone is required',
                'message.required' => 'Message is required',
            ],
        );

        if ($validator) {

            Contact::findOrFail($uid)->update([

                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'message' => $request->message,
                'ip_address' => $request->ip_address,

            ]);

        }

        toastr()->success('Contact Update Successfully');
        return redirect()->route('all.contact');

    }

    //Delete Contact
    public function DeleteContact($id)
    {
        Contact::findOrFail($id)->delete();

        toastr()->success('Contact Delete Successfully');
        return redirect()->route('all.contact');
    }
}
