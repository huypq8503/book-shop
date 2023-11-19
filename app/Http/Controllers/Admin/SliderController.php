<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Support\ValidatedData;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class SliderController extends Controller
{
    //

    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }
    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(SliderFormRequest $request)
    {
        $validatedData = $request->validated();


        $uploadPath = 'uploads/slider/';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move($uploadPath, $filename);    
            $finalPath = $uploadPath . $filename;
        }
        $validatedData['status'] = $request->status == true ? '1' : '0';
        Slider::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $finalPath,
            'status' => $validatedData['status']
        ]);


        return redirect('admin/slider')->with('message', 'Slider Added Succesfully');
    }

    public function edit(int $slider_id)
    {
        $sliders = Slider::findOrFail($slider_id);
        return view('admin.slider.edit', compact('sliders'));
    }

    public function update(SliderFormRequest $request, int $slider_id)
    {
   
        $validatedData = $request->validated();

        $sliders = Slider::findOrFail($slider_id);
        
        if ($sliders) {
            // $validatedData['status'] = $request->status == true ? '1' : '0';

            $uploadPath = 'uploads/slider/';
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move($uploadPath, $filename);
                $finalPath = $uploadPath . $filename;
            }
            $sliders->update([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'image' => $finalPath,
                'status' =>  $request->status == true ? '1' : '0'
            ]);
            return redirect('admin/slider/')->with('message', 'updated succesfully');
        }
    }

    public function destroy(int $slider_id)
    {
        $sliders = Slider::findOrFail($slider_id);
        if ($sliders->image) {
                if (File::exists($sliders->image)) {
                    File::delete($sliders->image);
                }  
        }
        $sliders->delete();
        return redirect('admin/slider/')->with('message', 'Product deleted with images');
    }
}
