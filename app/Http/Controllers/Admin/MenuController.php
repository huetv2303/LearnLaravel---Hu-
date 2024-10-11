<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Menu\CreateFormRequest;
use App\Http\Services\Menu\MenuService;

// Xử lý giao diện
class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function create()
    {
        return view('admin.menu.add',[
            'title' => 'Them danh muc',
            //lấy ra các list combobox
            'menus' => $this->menuService->getParent()

        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $result = $this->menuService->create($request);
        return redirect()->back();
    }
}
