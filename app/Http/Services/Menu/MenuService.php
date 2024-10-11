<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;



// Viết ra những câu truy vấn
class MenuService
{

    public function getParent()
    {
        //tìm những thằng id cha = 0;
        return Menu::where('parent_id', 0)->get();
    }
    public function create($request)
    {
        try {
            Menu::create([
                'name' => (string) $request->input('name'),
                'description' => (int) $request['description'],
                'parent_id' => (string) $request['parent_id'],
                'content' => (string) $request['content'],
                'active' => (string) $request['active'],

            ]);

            Session::flash('success','Tao danh muc thanh cong');
        }catch (\Exception $error){
            Session::flash('error', $error->getMessage());
            return false;
        }
        return true;
    }
}
