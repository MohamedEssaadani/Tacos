<?php

namespace App\Http\Controllers;

use App\Tacos;
use Illuminate\Http\Request;

class TacosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Tacos";

        $tacosList = Tacos::paginate(5);

        return view('admin.tacos.browse', [
            'page_title' => $page_title,
            'tacosList' => $tacosList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "New Tacos";

        return view('admin.tacos.create', [
            'page_title' => $page_title
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
            'tacos_name' => 'required|string|unique:tacos',
            'tacos_price' => 'required|numeric',
            'tacos_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //change imageName in order to be unique by time
        $imageName = time() . '.' . $request->tacos_image->extension();

        //move the image to the folder with new name
        $request->tacos_image->move(public_path('assets/img/tacos'), $imageName);

        $tacos = new Tacos();
        $tacos->tacos_name = $data["tacos_name"];
        $tacos->tacos_price = $data["tacos_price"];
        $tacos->image = $imageName;
        $tacos->save();

        return redirect()->route('Tacos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $page_title = "View Tacos";
        $tacos = Tacos::find($id);

        if ($tacos == null)
            return redirect()->route('Tacos.browse');
        else
            return view('admin.tacos.read', [
                'page_title' => $page_title,
                'tacos' => $tacos
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
        $page_title = "Edit";
        $tacos = Tacos::find($id);


        return view('admin.tacos.edit', [
            'page_title' => $page_title,
            'tacos' => $tacos
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $imageName = '';
        $data = $request->validate([
            'tacos_name' => 'required|string|unique:tacos,tacos_name,' . $id . ',tacos_id',
            'tacos_price' => 'required|numeric',
        ]);

        //if image changed if the admin choose a new image then
        if ($request->tacos_image != null) {

            $request->validate([
                'tacos_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            //change imageName in order to be unique by time
            $imageName = time() . '.' . $request->tacos_image->extension();

            //move the image to the folder with new name
            $request->tacos_image->move(public_path('assets/img/tacos'), $imageName);
        }

        $tacos = Tacos::find($id);
        $tacos->tacos_name = $data["tacos_name"];
        $tacos->tacos_price = $data["tacos_price"];
        //if admin change image then the $imageName will be fulfilled then we need to change image name from db, else we keep the old name
        $tacos->image = ($imageName == '') ? $tacos->image : $imageName;
        $tacos->save();

        return redirect()->route('Tacos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tacos::destroy($id);

        return redirect()->route('Tacos.index');
    }
}
