<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sites;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //All Sites
    public function AllSite()
    {
        $sites = Sites::all();
        return view('admin.pages.sites.all_sites', compact('sites'));
    }

    //Edit Sites
    public function EditSite($id)
    {
        $site = Sites::find($id);
        return view('admin.pages.sites.edit_sites', compact('site'));
    }

    //Update Sites
    public function UpdateSite(Request $request)
    {
        $uid = $request->id;
        $site = Sites::findOrFail($uid);

        $validator = $request->validate(

            [
                'site_name' => 'required|max:255',
                'site_slogan' => 'required|max:255',
                'phone_one' => 'required',
                'contact_email' => 'required',
            ],

            [
                'site_name.required' => 'Site Name is required',
                'site_slogan.required' => 'Site Slogan Name is required',
                'phone_one.required' => 'Phone Number is required',
                'contact_email.required' => 'Contact Email is required',
            ],
        );

        if ($validator) {

            if (!empty($request->file('logo_white'))) {

                $file = $request->file('logo_white');

                @unlink(public_path('upload/logo_white/' . $site->logo_white));
                
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/logo_white/'), $filename);
                $logo_white = $filename;
            }
            if (!empty($request->file('logo_black'))) {

                $file = $request->file('logo_black');
                @unlink(public_path('upload/logo_black/' . $site->logo_black));
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/logo_black/'), $filename);
                $logo_black = $filename;

            }

            if (!empty($request->file('favicon'))) {

                $file = $request->file('favicon');
                @unlink(public_path('upload/favicon/' . $site->favicon));
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/favicon/'), $filename);
                $favicon = $filename;

            }

            $site->update([

                'site_name' => $request->site_name,
                'site_slogan' => $request->site_slogan,
                'company_name' => $request->company_name,
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'whatsapp_number' => $request->whatsapp_number,
                'address' => $request->address,
                'default_currency' => $request->default_currency,

                'logo_white' => (!empty($logo_white) ? $logo_white : $site->logo_white),
                'logo_black' => (!empty($logo_black) ? $logo_black : $site->logo_black),
                'favicon' => (!empty($favicon) ? $favicon : $site->favicon),

                'currency_conversion_rate' => $request->currency_conversion_rate,
                'default_language' => $request->default_language,
                'contact_email' => $request->contact_email,
                'support_email' => $request->support_email,
                'info_email' => $request->info_email,
                'sales_email' => $request->sales_email,
                'facebook_url' => $request->facebook_url,
                'skype_url' => $request->skype_url,

                'twitter_url' => $request->twitter_url,
                'instagram_url' => $request->instagram_url,
                'linkedin_url' => $request->linkedin_url,
                'youtube_url' => $request->youtube_url,
                'github_url' => $request->github_url,
                'portfolio_url' => $request->portfolio_url,
                'fiver_url' => $request->fiver_url,
                'upwork_url' => $request->upwork_url,

                'service_days' => $request->service_days,
                'service_time' => $request->service_time,

            ]);

            toastr()->success('Sites Created Successfully');
            return redirect()->route('all.sites');

        }
    }
}
