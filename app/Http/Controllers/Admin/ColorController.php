<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;

class ColorController extends Controller
{
    public function index()
    {
       $colors= Color::all();

        return view('admin.colors.index',compact('colors'));
    }
    public function create()
    {
        return view('admin.colors.create');
    }

    public function store(ColorFormRequest $request)
    {
        $validatedData=$request->validated();
        $validatedData['status']=$request->status==true?'0':'1';
        Color::create($validatedData);
        return redirect('admin/colors')->with('message','Color Added Successfully');
    }
    //we  have to use the same varible name as we have used in our route
    //how this Color model is working
    public function edit( Color $color )
    {
         return view('admin.colors.edit',compact('color'));
    }

    public function update(ColorFormRequest $request,$color_id)
    {
        $validatedData=$request->validated();
        $validatedData['status']=$request->status==true?'0':'1';
        Color::find($color_id)->update($validatedData);
        return redirect('admin/colors')->with('message','Color Added Successfully');
    }

    public function destroy( $color_id){
        $colors=Color::findOrFail($color_id);
        $colors->delete();
        return redirect('admin/colors')->with('message','The color is deleted');
    }
}
