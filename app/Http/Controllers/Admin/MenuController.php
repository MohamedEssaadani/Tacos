<?php

namespace App\Http\Controllers\Admin;

use App\Tacos;
use App\Drink;
use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $menus = Menu::paginate(6);

        //for showing tacos name purpose, make associative array of  tacos items from the menu tacos ids
        //[tacos_id => object] with this id & show it in blade by the tacos id of iterable menu

        foreach ($menus as $menu) {
            $tacosItems[$menu->tacos_id] = Tacos::find($menu->tacos_id);
        }

        //for showing drink name purpose
        foreach ($menus as $menu) {
            $drinks[$menu->drink_id] = Drink::find($menu->drink_id);
        }

        return view('admin.menu.browse', [
            'page_title' => 'Menus',
            'menus' => $menus,
            'drinks' => $drinks,
            'tacosItems' => $tacosItems
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'New Menu';
        $tacosItems = Tacos::all();
        $drinks = Drink::all();

        return view('admin.menu.create', [
            'page_title' => $page_title,
            'tacosItems' => $tacosItems,
            'drinks' => $drinks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'menu_name' => 'required|string|max:50|unique:menus',
            'tacos_id' => 'required|numeric',
            'drink_id' => 'required|numeric',
            'menu_price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //change imageName in order to be unique by time
        $imageName = time() . '.' . $request->image->extension();

        //move the image to the folder with new name
        $request->image->move(public_path('assets/img/menus'), $imageName);

        $data['image'] = $imageName;
        $data['with_frite'] = (isset($request->fries)) ? true : false;

        Menu::create($data);

        return redirect()->route('Menus.index');
        // $value = ($request->fries == true) ? 'yes' :  'no';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menuInfos = $this->getMenu($id);

        return view('admin.menu.read', [
            'page_title' => 'Show Menu',
            'menu' => $menuInfos['menu'],
            'tacos' => $menuInfos['tacos'],
            'drink' => $menuInfos['drink']
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menuInfos = $this->getMenu($id);
        $tacosItems = Tacos::all();
        $drinks = Drink::all();

        return view('admin.menu.edit', [
            'page_title' => 'Edit Menu',
            'menu' => $menuInfos['menu'],
            'menu_tacos' => $menuInfos['tacos'],
            'menu_drink' => $menuInfos['drink'],
            'tacosItems' => $tacosItems,
            'drinks' => $drinks
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $imageName = '';
        $data = $request->validate([
            'menu_id' => 'required|numeric',
            'menu_name' => 'required|string|max:50|unique:menus,menu_name,' . $request->menu_id . ',menu_id',
            'tacos_id' => 'required|numeric',
            'drink_id' => 'required|numeric',
            'menu_price' => 'required|numeric',
        ]);

        //check if image changed or not
        if ($request->menu_image != null) {

            $imageName = time() . '.' . $request->menu_image->extension();

            $request->menu_image->move(public_path('assets/img/menus'), $imageName);
        }


        $menu = Menu::find($request->menu_id);
        $menu->menu_name = $request->menu_name;
        $menu->tacos_id = $request->tacos_id;
        $menu->drink_id = $request->drink_id;
        $menu->menu_price = $request->menu_price;
        //if admin change image then the $imageName will be fulfilled then we need to change image name from db, else we keep the old name
        $menu->image = ($imageName == '') ? $menu->image : $imageName;
        $menu->with_frite = (isset($request->fries)) ? true : false;
        $menu->save();

        return redirect()->route('Menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Menu::destroy($id);

        return redirect()->route('Menus.index');
    }

    public function getMenu($id)
    {
        $menuInfos['menu'] = Menu::find($id);
        $menuInfos['tacos'] = Tacos::find($menuInfos['menu']->tacos_id);
        $menuInfos['drink'] = Drink::find($menuInfos['menu']->drink_id);

        return $menuInfos;
    }
}
