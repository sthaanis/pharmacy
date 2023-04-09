<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Str;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::all();
        return view('admin.slider.list', ['sliders' => $slider]);
    }

    public function new ()
    {
        return view('admin.slider.new');
    }

    public function save(Request $request)
    {
        $slider = new slider();
        $slider->title = $request->get('title');
        $slider->description = $request->get('description');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileOriginalName = $image->getClientOriginalName();
            $path = public_path('slider/');
            $fileName = date('Ymd') . '-' . Str::random(5) . '-' . $fileOriginalName;

            $image->move($path, $fileName);
            $slider->image = $fileName;
        }


        $slider->alt_option = $request->get('alt_option');
        $slider->save();
        return redirect()->back();
    }

    public function details($id)
    {
        $slider = slider::findOrFail($id);
        return view('admin.slider.detail', ['slider' => $slider]);
    }

    public function edit($id)
    {
        $slider = slider::findOrFail($id);
        return view('admin.slider.edit', ['slider' => $slider]);
    }

    public function update(Request $request)
    {
        $slider = new slider();
        $slider->title = $request->get('title');
        $slider->description = $request->get('description');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = date('Ymd') . '-' . Str::random(5) . '-' . $image->getClientOriginalExtension();
            $path = public_path('slider');
            $image->move($path, $fileName);
            $slider->image = $image;
        }
        $slider->alt_option = $request->get('alt_option');
        $slider->save();
        return redirect()->back();
    }

    public function remove($id)
    {

        $slider = Slider::findOrFail($id);
        $slider->delete();
        return redirect()->route('pharmacy.admin.slider.index');
    }

    public function trash()
    {
        $slider = slider::onlyTrashed()->get();
        return view('admin.slider.trash', ['sliders' => $slider]);
    }

    public function restore($id)
    {
        $slider = slider::withTrashed()->findOrFail($id);
        $slider->restore();
        return redirect()->back();
    }


}