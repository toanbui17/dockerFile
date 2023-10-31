<?php

namespace App\Http\Controllers\Product;

use App\Exports\ExportProduct;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Encore\Admin\Grid\Exporters\AbstractExporter;
//use Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = 'product';
        $data = Product::orderBy('created_at','desc')
        ->limit(10)
        ->get();

        return view('product.index',['title'=>$title,'data'=>$data]);
    }

    public function getName(Request $request){
        $title = 'product '.$request->all()['key_word'];

        $name = $request->all()['key_word'];
        $dataName = Product::where('name_pd','like',"%$name%")
        ->orderBy('created_at','desc')
        ->get();

        return view('home.home_nameProduct',['title'=>$title,'dataName'=>$dataName]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //add
        $title = 'Add-Product';
        return view('form.product.form_add',['title'=>$title]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //store product
        $request->validate([
            'name_pd'           => 'required|unique:products',
            'quantity_pd'       => 'required',
            'sold_pd'           => 'required',
            'image_pd'          => 'required|image|mimes:jpg,bmp,png',
            'price_pd'          => 'required',
            'describe_pd'       => 'required',
        ]);


        $fileName = rand().'.'.$request->image_pd->extension();
        $request->image_pd->move(public_path('upload'),$fileName);

        $product = new Product;

        $product->name_pd       = $request->name_pd;
        $product->quantity_pd   = $request->quantity_pd;
        $product->sold_pd       = $request->sold_pd;
        $product->image_pd      = $fileName;
        $product->price_pd      = $request->price_pd;
        $product->describe_pd   = $request->describe_pd;

        $product->save();

        return back()->with('good','tao product da thanh cong');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //productId
        $title = 'Product'.$id;
        $dataId = Product::find($id);

        return view('',['title'=>$title,'dataId'=>$dataId]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //productId
        $title = 'Product-Exit';

        if(!empty($id)){
            $dataEdit = Product::find($id);
    
            return view('form.product.form_edit',['title'=>$title,'dataEdit'=>$dataEdit]);
        }else{
            return back()->with('msg','product khong ton tai');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //update product
        if (!empty($id)) {
            $product = Product::find($id);

            $request->validate([
                'name_pd'       => 'required',
                'quantity_pd'   => 'required',
                'sold_pd'       => 'required',
                'image_pd'      => 'required|image|mimes:jpg,bmp,png',
                'price_pd'      => 'required',
                'describe_pd'   => 'required',
            ]);

            $fileName = rand().'.'.$request->image_pd->extension();
            $request->image_pd->move(public_path('upload'),$fileName);

            $product->name_pd       = $request->name_pd;
            $product->quantity_pd   = $request->quantity_pd;
            $product->sold_pd       = $request->sold_pd;
            $product->image_pd      = $fileName;
            $product->price_pd      = $request->price_pd;
            $product->describe_pd   = $request->describe_pd;

            $product->save();
            return redirect()->route('product')->with('msg','san pham da xoa');
        }else{
            return redirect()->route('product')->with('msg','san pham khong ton tai');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Product delete
        $dataDelete = Product::find($id);
        $dataDelete->delete();

        return back()->with('smg','xoa thanh cong product');
    }

    //xuat du lieu ra file excel
    public function export(){
        
        return Excel::download(new ExportProduct, 'exportProducts.xlsx');
    }
}
