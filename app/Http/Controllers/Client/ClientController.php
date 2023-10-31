<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Personnel;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use UnitEnum;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all client
        $title = 'staff';
        return view('client.staff_All',['title'=>$title]);
    }

    public function allProductClient(){
        $title = 'product';
        $dataUser = Product::all();
        return view('product.product_client',['title'=>$title,'dataUser'=>$dataUser]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $title = 'edit_personnel';
        $dataUser = User::find($id);

        if (!empty($dataUser)) {
            return view('form.admin.form_editUser',['title'=>$title,'dataUser'=>$dataUser]);
        }else{
            return back()->with(['msg'=>'user chua duoc cap nhat!']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $dataUpdate =  Personnel::find($id);

        $request->validate([
            'office'        => 'required',
            'age'           => 'required',
            'image'         => 'required|image|mimes:jpg,bmp,png',
            'number_phone'  => 'required',
            'address'       => 'required',
        ]);

        $image                  = $request->file('image');
        $new_name               = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('upload'), $new_name);

        $dataUpdate->office          = $request->office;
        $dataUpdate->age             = $request->age;
        $dataUpdate->image           = $new_name;
        $dataUpdate->number_phone    = $request->number_phone;        
        $dataUpdate->address         = $request->address;

        $dataUpdate->saver();
        return back()->with(['good'=>'da update thanh cong tai khoan']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
