<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\PageSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class PageSettingController extends Controller
{
    protected $rules =
    [
        'best_seller_banner' => 'mimes:jpeg,jpg,png,svg',
        'big_save_banner'    => 'mimes:jpeg,jpg,png,svg',
        'best_seller_banner1' => 'mimes:jpeg,jpg,png,svg',
        'big_save_banner1'    => 'mimes:jpeg,jpg,png,svg',
        'faq_image'    => 'mimes:jpeg,jpg,png,svg',
        'newsletter_image'    => 'mimes:jpeg,jpg,png,svg',
    ];

    protected $customs =
    [
        'best_seller_banner.mimes'  => 'Photo type must be in jpeg, jpg, png, svg.',
        'big_save_banner.mimes'     => 'Photo type must be in jpeg, jpg, png, svg.',
        'best_seller_banner1.mimes' => 'Photo type must be in jpeg, jpg, png, svg.',
        'big_save_banner1.mimes'    => 'Photo type must be in jpeg, jpg, png, svg.',
        'faq_image.mimes'    => 'Photo type must be in jpeg, jpg, png, svg.',
        'newsletter_image.mimes'    => 'Photo type must be in jpeg, jpg, png, svg.'

    ];

    public function update(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), $this->rules,$this->customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = PageSetting::findOrFail(1);
        $input = $request->all();
        if ($file = $request->file('hero_bg'))
        {
            $name = time().str_replace(' ', '', $file->getClientOriginalName());
            $data->upload($name,$file,$data->hero_bg);
            $input['hero_bg'] = $name;
        }

        if ($file = $request->file('instructor_img'))
        {
            $name = time().str_replace(' ', '', $file->getClientOriginalName());
            $data->upload($name,$file,$data->instructor_img);
            $input['instructor_img'] = $name;
        }

        if ($file = $request->file('faq_image'))
        {
            $name = time().str_replace(' ', '', $file->getClientOriginalName());
            $data->upload($name,$file,$data->faq_image);
            $input['faq_image'] = $name;
        }

        if ($file = $request->file('newsletter_image'))
        {
            $name = time().str_replace(' ', '', $file->getClientOriginalName());
            $data->upload($name,$file,$data->newsletter_image);
            $input['newsletter_image'] = $name;
        }

        $data->update($input);
        return redirect()->back()->with('message', 'Settings updated Successfully');
    }


    public function homeUpdate(Request $request)
    {
        $data = PageSetting::findOrFail(1);
        $input = $request->all();
        if ($request->slider == ""){
            $input['slider'] = 0;
        }

        if ($request->service == ""){
            $input['service'] = 0;
        }

        if ($request->featured == ""){
            $input['featured'] = 0;
        }
        if ($request->small_banner == ""){
            $input['small_banner'] = 0;
        }

        if ($request->best == ""){
            $input['best'] = 0;
        }

        if ($request->top_rated == ""){
            $input['top_rated'] = 0;
        }

        if ($request->large_banner == ""){
            $input['large_banner'] = 0;
        }

        if ($request->big == ""){
            $input['big'] = 0;
        }

        if ($request->hot_sale == ""){
            $input['hot_sale'] = 0;
        }

        if ($request->review_blog == ""){
            $input['review_blog'] = 0;
        }

        if ($request->partners == ""){
            $input['partners'] = 0;
        }

        if ($request->bottom_small == ""){
            $input['bottom_small'] = 0;
        }

        if ($request->flash_deal == ""){
            $input['flash_deal'] = 0;
        }

        if ($request->featured_category == ""){
            $input['featured_category'] = 0;
        }

        $data->update($input);
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
    }


    public function contact()
    {
        $data['title'] = "Contact";
        $data['setting'] = PageSetting::find(1);

        return view('backend.page-setting.contact', $data);
    }

    public function customize()
    {
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.customize',compact('data'));
    }

    public function best_seller()
    {
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.best_seller',compact('data'));
    }

    public function big_save()
    {
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.big_save',compact('data'));
    }

    public function heroSection()
    {
        $data['title'] = "Hero Section";
        $data['hero-section'] = PageSetting::findOrFail(1);

        return view('backend.page-setting.hero-section', $data);
    }
    public function instructorSection ()
    {
        $data['title'] = "Instructor Section";
        $data['instructor-section'] = PageSetting::findOrFail(1);

        return view('backend.page-setting.instructor', $data);
    }
    public function faqSection ()
    {
        $data['title'] = "FAQ Section";
        $data['faq-section'] = PageSetting::findOrFail(1);

        return view('backend.page-setting.faq-section', $data);
    }
    public function newsLetterSection ()
    {
        $data['title'] = "News Letter Section";
        $data['news-letter-section'] = PageSetting::findOrFail(1);

        return view('backend.page-setting.news-letter', $data);
    }

    //Upadte About Page Section Settings

    //Upadte FAQ Page Section Settings
    public function faqupdate($status)
    {
        $page = Pagesetting::findOrFail(1);
        $page->f_status = $status;
        $page->update();
        Session::flash('success', 'FAQ Status Upated Successfully.');
        return redirect()->back();
    }

    public function contactup($status)
    {
        $page = Pagesetting::findOrFail(1);
        $page->c_status = $status;
        $page->update();
        Session::flash('success', 'Contact Status Upated Successfully.');
        return redirect()->back();
    }

    //Upadte Contact Page Section Settings
    public function contactUpdate(Request $request)
    {
        $page = Pagesetting::findOrFail(1);
        $input = $request->all();
        $page->update($input);
        Session::flash('success', 'Contact page content updated successfully.');
        return redirect()->route('admin-ps-contact');;
    }
}
