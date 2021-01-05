<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PuppyPage extends Model
{
    use HasFactory;

    public function explodeImages() {
      $this->images_small = explode(";", $this->images_small);
      $this->images_big = explode(";", $this->images_big);
    }
    public function remove($code) {
        $image = $this->select('image_main')->where('code', $code)->first();
        Image::deleteImage($image);
        $this->where('code', $code)->delete();
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'code' => [
                'required',
                'unique:puppy_pages,code',
                'max:255',
                'not_regex:/\W/i',
            ],
            'title' => [
                'required',
            ],
            'description' => [
                'required',
            ],
            'sex' => [
                'required',
            ],
            'image' => [
                'image',
                'required'
            ]
        ]);
        $imageName = Image::saveImage($request->file('image'), $request->input('code'));

        $this->insert([
            'id' => NULL,
            'code'=> $request->input('code'),
            'title'=> $request->input('title'),
            'description'=> $request->input('description'),
            'sex'=> $request->input('sex'),
            'image_main' =>"$imageName",
            'images_big' =>"$imageName",
            'images_small'=>"$imageName"
        ]);
    }
    public function edit($code) {
        $p = $this->where('code', $code)->first();
        return view('edit_puppy',['obj'=>$p]);
    }
    public function myUpdate(Request $request) {
        $validatedData = $request->validate([
            'code' => [
                'required',
                'unique:puppy_pages,code,'.$request->input('id'),
                'max:255',
                'not_regex:/\W/i',
            ],
            'title' => [
                'required',
            ],
            'description' => [
                'required',
            ],
            'sex' => [
                'required',
            ],
        ]);
        $old = $this->where('id', $request->input('id'))->first();
        var_dump($old);
        if ($request->hasFile("image")) {
            Image::deleteImage($old->image_main);
            $imageName = Image::saveImage($request->file('image'), $request->input('code'));
        } else {
            $imageName = $old->image_main;
        }
        $this->where("id", $request->input("id"))->update([
            'code'=> $request->input('code'),
            'title'=> $request->input('title'),
            'description'=> $request->input('description'),
            'sex'=> $request->input('sex'),
            'image_main' =>"$imageName",
            'images_big' =>"$imageName",
            'images_small'=>"$imageName"
        ]);
    }



}
