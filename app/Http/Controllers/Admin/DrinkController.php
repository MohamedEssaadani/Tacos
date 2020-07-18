<?php

namespace App\Http\Controllers\Admin;

use App\Drink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Drinks";

        $drinks = Drink::paginate(5);

        if ($drinks->count() > 0)
            return view('admin.drink.browse', [
                'page_title' => $page_title,
                'drinks' => $drinks
            ]);
        else
            return redirect()->route('Dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'New Drink';
        $drink_types = ['Soda', 'Water', 'Juice'];

        return view('admin.drink.create', [
            'page_title' => $page_title,
            'drink_types' => $drink_types
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
        $request->validate([
            'drink_name' => 'required|string|max:20|unique:drinks',
            'drink_type' => 'required|string|max:20',
            'drink_price' => 'required|numeric',
            'drink_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //change imageName in order to be unique by time
        $imageName = time() . '.' . $request->drink_image->extension();

        //move the image to the folder with new name
        $request->drink_image->move(public_path('assets/img/drinks'), $imageName);

        $drink =  new Drink();
        $drink->drink_name = $request->drink_name;
        $drink->drink_type = $request->drink_type;
        $drink->drink_price = $request->drink_price;
        $drink->drink_image = $imageName;
        $drink->save();

        return redirect()->route('Drinks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $drink = Drink::find($id);
        $page_title = 'View Drink';

        return view('admin.drink.read', [
            'drink' => $drink,
            'page_title' => $page_title
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
        $drink = Drink::find($id);
        $drink_types = ['Soda', 'Water', 'Juice'];

        return view('admin.drink.edit', [
            'page_title' => 'Edit Drink',
            'drink' => $drink,
            'drink_types' => $drink_types
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
        $request->validate([
            'drink_name' => 'required|string|max:20|unique:drinks,drink_name,' . $id . ',drink_id',
            'drink_type' => 'required|string|max:20',
            'drink_price' => 'required|numeric',
        ]);

        //if image changed if the admin choose a new image then
        if ($request->drink_image != null) {

            $request->validate([
                'drink_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            //change imageName in order to be unique by time
            $imageName = time() . '.' . $request->drink_image->extension();

            //move the image to the folder with new name
            $request->drink_image->move(public_path('assets/img/drinks'), $imageName);
        }

        $drink =  Drink::find($id);
        $drink->drink_name = $request->drink_name;
        $drink->drink_type = $request->drink_type;
        $drink->drink_price = $request->drink_price;
        //if admin change image then the $imageName will be fulfilled then we need to change image name from db, else we keep the old name
        $drink->drink_image = ($imageName == '') ? $drink->drink_image : $imageName;
        $drink->save();

        return redirect()->route('Drinks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Drink::destroy($id);

        return redirect()->route('Drinks.index');
    }

    public function filter($filter)
    {
        $drinks = Drink::where('drink_type', $filter)
            ->paginate(5);

        return view('admin.drink.browse', [
            'page_title' => 'Drinks',
            'drinks' => $drinks
        ]);
    }
}
