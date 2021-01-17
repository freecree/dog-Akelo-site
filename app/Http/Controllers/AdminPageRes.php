<?php

namespace App\Http\Controllers;

use App\Image;
use App\Page;
use Illuminate\Http\Request;

class AdminPageRes extends PageController
{
    public function showSort() {
        $parent_code = $_GET['code'];
        $p = Page::where('parent_code', $parent_code)->orderBy('order_num')->get();

        return view('admin.sort_page', ['objects'=>$p]);
    }

    public function sort(Request $request) {
        $parent_code = $request->input("parent_code");
        $pages = Page::where('parent_code', $parent_code)->get();
        foreach ($pages as $p) {

            if($request->input("$p->id")) {
                Page::where('id', $p->id)->update([
                    'order_num'=> $request->input($p->id)
                ]);
            }
        }
        return redirect("/admin/page");

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p = Page::orderBy('order_num')->get()->groupBy('parent_code');
        return view('admin.pages_block', ['obj'=>$p]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_code = $_GET['code'];
        if ($parent_code == 'puppies') {
            return view('admin.create_puppy', ['parent_code'=>$parent_code]);
        } else if($parent_code == 'events') {
            return view('admin.create_event', ['parent_code'=>$parent_code]);
        } else {
            return redirect("/admin/page");
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Page::validate($request, $request->input('parent_code'));
        $imageName = Page::storeImage($request);
        $data = request()->except(['_token', 'image']);
        $data['image_main'] = $imageName;
        $data['images_big'] = $imageName;
        $data['images_small'] = $imageName;
        $data = Page::aliasCheck($data);
        $store = Page::insert([$data]);
        if($store) {
            session(['status' => 'Страница успешно создана!']);
            session(['status_code' => 'success']);
        } else {
            session()->flash('status', 'Ошибка! Страница не создана!');
            session()->flash('status_code', 'error');
        }
        return redirect("/admin/page");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($code)
    {
        $p = Page::where('code', $code)->firstOrFail();
        if ($p->parent_code == 'puppies') {
            return view('admin.edit_puppy',['obj'=>$p]);
        } else if($p->parent_code == 'events') {
            return view('admin.edit_event',['obj'=>$p]);
        } else {
            return view('admin.edit_container',['obj'=>$p]);
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $code)
    {
        $page = Page::where("code", $code)->first();
        Page::validate($request, $page->parent_code);
        $imageName = Page::updateImage($request);
        $data = request()->except(['_token', 'image']);
        $data['image_main'] = $imageName;
        $data['images_big'] = $imageName;
        $data['images_small'] = $imageName;
        $update = Page::find($request->input("id"))->fill($data)->save();
         if($update) {
             session(['status' => 'Страница успешно обновлена!']);
             session(['status_code' => 'success']);
         } else {
             session()->flash('status', 'Ошибка! Страница не обновлена!');
             session()->flash('status_code', 'error');
        }
        return redirect("/admin/page");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        $page = Page::where("code", $code)->first();
        $image = $page->select('image_main')->where('code', $code)->first();
        Image::deleteImage($image->image_main);
        $destroy = Page::where('code', $code)->delete();
        if($destroy) {
            session(['status' => 'Страница успешно удалена!']);
            session(['status_code' => 'success']);
        } else {
            session()->flash('status', 'Ошибка! Страница не удалена!');
            session()->flash('status_code', 'error');
        }
        return redirect("/admin/page");

    }
}
