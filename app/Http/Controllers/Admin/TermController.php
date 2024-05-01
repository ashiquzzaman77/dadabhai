<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Terms;
use Illuminate\Http\Request;

class TermController extends Controller
{
    //All Term
    public function AllTerm()
    {
        $terms = Terms::latest()->get();
        return view('admin.pages.term.all_term', compact('terms'));
    }

    //Add Term
    public function AddTerm()
    {
        return view('admin.pages.term.add_term');
    }

    //Store Term
    public function StoreTerm(Request $request)
    {
        $validator = $request->validate(
            [
                'name' => 'required|max:255',
                'content' => 'required',
                'effective_date' => 'required',
                'expiration_date' => 'required',
            ],

            [
                'name.required' => 'Name is required',
                'content.required' => 'Content is required',
                'effective_date.required' => 'Effective Date is required',
                'expiration_date.required' => 'Effective Date is required',
            ],
        );

        if ($validator) {

            $term = new Terms();
            $term->name = $request->name;
            $term->content = $request->content;
            $term->effective_date = $request->effective_date;
            $term->expiration_date = $request->expiration_date;
            $term->version = $request->version;

            $term->save();

            toastr()->success('Term Created Successfully');
            return redirect()->route('all.term');
        }

    }

    //Edit Term
    public function EditTerm($id)
    {
        $term = Terms::findOrFail($id);
        return view('admin.pages.term.edit_term', compact('term'));
    }

    //Update Faq
    public function UpdateTerm(Request $request)
    {
        $uid = $request->id;

        $validator = $request->validate(

            [
                'name' => 'required|max:255',
                'content' => 'required',
                'effective_date' => 'required',
                'expiration_date' => 'required',
            ],

            [
                'name.required' => 'Name is required',
                'content.required' => 'Content is required',
                'effective_date.required' => 'Effective Date is required',
                'expiration_date.required' => 'Effective Date is required',
            ],
        );

        if ($validator) {

            Terms::find($uid)->update([

                'name' => $request->name,
                'content' => $request->content,
                'effective_date' => $request->effective_date,
                'expiration_date' => $request->expiration_date,
                'version' => $request->version,

            ]);

            toastr()->success('Term Update Successfully');
            return redirect()->route('all.term');
        }

    }

    //Delete Faq
    public function DeleteTerm($id)
    {

        Terms::find($id)->delete();

        toastr()->success('Term Delete Successfully');

        return redirect()->route('all.term');
    }

    //Inactive Faq
    public function InactiveTerm($id)
    {
        Terms::find($id)->update([
            'status' => '0',
        ]);

        toastr()->success('Term Inactive Successfully');

        return redirect()->back();
    }

    //Active Faq
    public function Activeterm($id)
    {

        Terms::find($id)->update([
            'status' => '1',
        ]);

        toastr()->success('Term Active Successfully');

        return redirect()->back();
    }
}
