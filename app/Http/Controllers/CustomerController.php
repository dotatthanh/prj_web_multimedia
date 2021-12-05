<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomerRequest;
use DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = Customer::paginate(10);

        if ($request->search) {
            $customers = Customer::where('name', 'like', '%'.$request->search.'%')->paginate(10);
            $customers->appends(['search' => $request->search]);
        }

        $data = [
            'customers' => $customers
        ];

        return view('customer.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        // try {
        //     DB::beginTransaction();
            
        //     $file_path = '';
        //     if ($request->file('avatar')) {
        //         $name = time().'_'.$request->avatar->getClientOriginalName();
        //         $file_path = 'uploads/avatar/customer/'.$name;
        //         Storage::disk('public_uploads')->putFileAs('avatar/customer', $request->avatar, $name);
        //     }
            
        //     $customer = Customer::create([
        //         'code' => '',
        //         'name' => $request->name,
        //         'gender' => $request->gender,
        //         'birthday' => date("Y-m-d", strtotime($request->birthday)),
        //         'phone_number' => $request->phone_number,
        //         'address' => $request->address,
        //         'avatar' => $file_path,
        //     ]);

        //     $customer->update([
        //         'code' => 'KH'.str_pad($customer->id, 6, '0', STR_PAD_LEFT)
        //     ]);
            
        //     DB::commit();
        //     return redirect()->route('customers.index')->with('alert-success','Thêm khách hàng thành công!');
        // } catch (Exception $e) {
        //     DB::rollback();
        //     return redirect()->back()->with('alert-error','Thêm khách hàng thất bại!');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        // $data = [
        //     'data_edit' => $customer
        // ];

        // return view('customer.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCustomerRequest $request, Customer $customer)
    {
        // try {
        //     DB::beginTransaction();

        //     if ($request->file('avatar')) {
        //         $name = time().'_'.$request->avatar->getClientOriginalName();
        //         $file_path = 'uploads/avatar/customer/'.$name;
        //         Storage::disk('public_uploads')->putFileAs('avatar/customer', $request->avatar, $name);
                
        //         $customer->update([
        //             'name' => $request->name,
        //             'gender' => $request->gender,
        //             'birthday' => date("Y-m-d", strtotime($request->birthday)),
        //             'phone_number' => $request->phone_number,
        //             'address' => $request->address,
        //             'avatar' => $file_path,
        //         ]);
        //     }
        //     else {
        //         $customer->update([
        //             'name' => $request->name,
        //             'gender' => $request->gender,
        //             'birthday' => date("Y-m-d", strtotime($request->birthday)),
        //             'phone_number' => $request->phone_number,
        //             'address' => $request->address,
        //         ]);
        //     }
            
        //     DB::commit();
        //     return redirect()->route('customers.index')->with('alert-success','Sửa khách hàng thành công!');
        // } catch (Exception $e) {
        //     DB::rollback();
        //     return redirect()->back()->with('alert-error','Sửa khách hàng thất bại!');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        try {
            DB::beginTransaction();

            if ($customer->products->count() > 0) {
                return redirect()->back()->with('alert-error','Xóa khách hàng thất bại! Khách hàng '.$customer->name.' đang có sản phẩm.');
            }

            $customer->destroy($customer->id);
            
            DB::commit();
            return redirect()->route('customers.index')->with('alert-success','Xóa khách hàng thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Xóa khách hàng thất bại!');
        }
    }
}
