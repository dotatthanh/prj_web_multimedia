<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(10);

        if ($request->search) {
            $contacts = Contact::where('email', 'like', '%'.$request->search.'%')->orderBy('created_at', 'desc')->paginate(10);
            $contacts->appends(['search' => $request->search]);
        }

        $data = [
            'contacts' => $contacts
        ];

        return view('contact.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        try {
            DB::beginTransaction();

            // if ($contact->projects->count() > 0) {
            //     return redirect()->back()->with('alert-error','Xóa liên hệ thất bại! liên hệ '.$contact->name.' đang có dự án.');
            // }

            $contact->destroy($contact->id);
            
            DB::commit();
            return redirect()->route('contacts.index')->with('alert-success','Xóa liên hệ thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Xóa liên hệ thất bại!');
        }
    }
}
