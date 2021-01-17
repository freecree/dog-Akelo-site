<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'sex', 'description', 'code', 'image_main',
        'images_big', 'images_small', 'event_date', 'alias_of',
    ];

    static public function aliasCheck($data) {
        if(isset($data['alias_of'])) {
            $p = self::where('code',$data['alias_of'])->first();
            foreach ($data as $k => $val) {
                if($data[$k] == NULL && $p->$k != NULL ) {
                    $data[$k] = $p->$k;
                }
                if($data[$k] == 'no-image.jpg' && $p->$k != 'no-image.jpg') {
                    $data[$k] = $p->$k;
                }
            }
        }
        return $data;
    }

    public function breadCramp() {
        $codes = $this->getRoute();
        $codes = explode('/', $codes);
        $obj = [];
        foreach ($codes as $code) {
            array_push($obj, self::where('code', $code)->first());
        }
        return $obj;
    }

    public function getRoute() {
         $p = $this;
         $route = "";
         while ($p->parent_code != 'root') {
             if($p->alias_of != NULL) {
                $p = self::where('code', $p->alias_of)->first();
             }
             $route = ($route) ? $p->code."/".$route : $p->code;
             $p = self::where('code', $p->parent_code)->first();
         }
        $route = ($route) ? $p->code."/".$route : $p->code;
         return $route;
    }
    public function children() {
        $p = $this::where('parent_code', $this->code)->get();
        if(count($p) > 1) {
            return true;
        }
        return false;
    }
    public function render() {
        $this->items = $this::where('parent_code', "$this->code")->orderBy('order_num')->get();
        if ($this->parent_code == 'puppies') {
            $this->explodeImages();
            return view("puppy", ['obj'=>$this]);
        } else if ($this->parent_code == 'events') {
            return view("event", ['obj'=>$this]);
        } else if ($this->code == 'puppies') {
            return view("puppies", ['obj'=>$this]);
        } else if ($this->code == 'events') {
            return view("events", ['obj'=>$this]);
        }
    }
    public function explodeImages() {
        $this->images_small = explode(";", $this->images_small);
        $this->images_big = explode(";", $this->images_big);
    }
    static public function validate(Request $request, $parent_code) {
        if ($parent_code == 'puppies') {
            $validatedData = $request->validate([
                'code' => [
                    'required',
                    'unique:pages,code,'.$request->input('id'),
                    'not_regex:/\W/i',
                ],
                'title' => 'required',
                'description' => 'required',
                'sex' => 'required',
            ]);
        } else if($parent_code == 'events') {
            if (!$request->input('alias_of')) {
                $validatedData = $request->validate([
                    'code' => [
                        'required',
                        'unique:pages,code,'.$request->input('id'),
                        'not_regex:/\W/i',
                    ],
                    'title' => 'required',
                    'description' => 'required',
                    'event_date' => 'required|date|date_format:Y-m-d',

                ]);
            } else {
                $validatedData = $request->validate([
                    'alias' => 'exists:pages,code',
                    'event_date' => 'required|date|date_format:Y-m-d',
                    'code' => 'required',
                ]);
            }
        } else {
            $validatedData = $request->validate([
                'title' => 'required',
            ]);
        }
    }

    static public function storeImage(Request $request) {
        if ($request->hasFile("image")) {
            return Image::saveImage($request->file('image'), $request->input('code'));
        } else {
            return "no-image.jpg";
        }
    }
    static public function updateImage(Request $request) {
        $old = Page::where('id', $request->input('id'))->first();
        if ($request->hasFile("image")) {
            Image::deleteImage($old->image_main);
            $imageName = Image::saveImage($request->file('image'), $request->input('code'));
        } else {
            $imageName = $old->image_main;
        }
        return $imageName;
    }
}
