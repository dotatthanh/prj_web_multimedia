<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::paginate(10);

        if ($request->search) {
            $products = Product::where('name', 'like', '%'.$request->search.'%')->paginate(10);
            $products->appends(['search' => $request->search]);
        }

        $data = [
            'products' => $products
        ];

        return view('product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('type', 1)->get();
        $customers = Customer::all();

        $data = [
            'categories' => $categories,
            'customers' => $customers,
        ];

        return view('product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        try {
            DB::beginTransaction();

            if ($request->file('image')) {
                $name = time().'_'.$request->image->getClientOriginalName();
                $file_path_image = 'uploads/product/'.$name;
                Storage::disk('public_uploads')->putFileAs('product', $request->image, $name);
            }

            if ($request->file('file')) {
                $name = time().'_'.$request->file->getClientOriginalName();
                $file_path_file = 'uploads/product/'.$name;
                Storage::disk('public_uploads')->putFileAs('product', $request->file, $name);
            }
            
            $create = Product::create([
                'code' => '',
                'name' => $request->name,
                'image' => $file_path_image,
                'file' => $file_path_file,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'customer_id' => $request->customer_id,
            ]);

            $create->update([
                'code' => 'SP'.str_pad($create->id, 6, '0', STR_PAD_LEFT)
            ]);
            
            DB::commit();
            return redirect()->route('products.index')->with('alert-success','Th??m s???n ph???m th??nh c??ng!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Th??m s???n ph???m th???t b???i!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::where('type', 1)->get();
        $customers = Customer::all();

        $data = [
            'data_edit' => $product,
            'categories' => $categories,
            'customers' => $customers,
        ];

        return view('product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            DB::beginTransaction();

            $data = [
                'name' => $request->name,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'customer_id' => $request->customer_id,
            ];

            if ($request->file('image')) {
                $name = time().'_'.$request->image->getClientOriginalName();
                $file_path_image = 'uploads/product/'.$name;
                Storage::disk('public_uploads')->putFileAs('product', $request->image, $name);
                $data['image'] = $file_path_image;
            }

            if ($request->file('file')) {
                $name = time().'_'.$request->file->getClientOriginalName();
                $file_path_file = 'uploads/product/'.$name;
                Storage::disk('public_uploads')->putFileAs('product', $request->file, $name);
                $data['file'] = $file_path_file;
            }

            $product->update($data);
            
            DB::commit();
            return redirect()->route('products.index')->with('alert-success','S???a s???n ph???m th??nh c??ng!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','S???a s???n ph???m th???t b???i!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            DB::beginTransaction();

            Product::destroy($product->id);
            
            DB::commit();
            return redirect()->route('products.index')->with('alert-success','X??a s???n ph???m th??nh c??ng!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','X??a s???n ph???m th???t b???i!');
        }
    }

    public function changeStatus(Product $product)
    {
        try {
            DB::beginTransaction();

            $product->update([
                'status' => 1
            ]);
            
            DB::commit();
            return redirect()->route('products.index')->with('alert-success','Duy???t s???n ph???m th??nh c??ng!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Duy???t s???n ph???m th???t b???i!');
        }
    }
}
