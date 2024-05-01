<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //All Faq
    public function AllFaq()
    {
        $faqs = Faq::orderBy('order', 'ASC')->latest()->get();
        return view('admin.pages.faq.all_faq', compact('faqs'));
    }

    //Store Faq
    public function StoreFaq(Request $request)
    {
        $validator = $request->validate(
            [
                // 'category' => 'required|max:255',
                'order' => 'required|unique:faqs',
                'question' => 'required',
                'answer' => 'required',
            ],

            [
                // 'category.required' => 'The Category Name is required',
                'order.required' => 'Order is required',
                'order.unique' => 'This value already inserted',
                'question.required' => 'The Question is required',
                'answer.required' => 'The Answer is required',
            ],
        );

        if ($validator) {

            $faq = new Faq();
            $faq->category = $request->category;
            $faq->order = $request->order;
            $faq->question = $request->question;
            $faq->answer = $request->answer;

            $faq->save();

            toastr()->success('Faq Created Successfully');
            return redirect()->route('all.faq');
        }

    }

    //Update Faq
    public function UpdateFaq(Request $request)
    {
        $faq = Faq::findOrFail($request->id);

        $validator = $request->validate(

            [
                'order' => ($faq->order != $request->order) ? 'required|unique:faqs' : 'nullable',

                'question' => 'required',
                'answer' => 'required',
            ],

            [
                // 'category.required' => 'The Category Name is required',
                'order.required' => 'Order is required',
                'order.unique' => 'This value already inserted',
                'question.required' => 'The Question is required',
                'answer.required' => 'The Answer is required',
            ],
        );

        if ($validator) {

            $faq->update([

                'category' => $request->category,

                'order' => ($faq->order != $request->order) ? $request->order : $faq->order,

                'question' => $request->question,
                'answer' => $request->answer,

            ]);

            toastr()->success('Faq Update Successfully');
            return redirect()->route('all.faq');
        }

    }

    //Delete Faq
    public function DeleteFaq($id)
    {

        Faq::find($id)->delete();

        toastr()->success('Faq Delete Successfully');

        return redirect()->route('all.faq');
    }

    //Inactive Faq
    public function InactiveFaq($id)
    {
        Faq::find($id)->update([
            'status' => '0',
        ]);

        toastr()->success('Faq Inactive Successfully');

        return redirect()->back();
    }

    //Active Faq
    public function ActiveFaq($id)
    {

        Faq::find($id)->update([
            'status' => '1',
        ]);

        toastr()->success('Faq Active Successfully');

        return redirect()->back();
    }

    //FaqSelectDelete
    public function FaqSelectDelete(Request $request)
    {

        $ids = $request->ids;
        Faq::whereIn('id',$ids)->delete();

        toastr()->success('Faq Delete Successfully!!!');
        
        return redirect()->back();
    }

}
