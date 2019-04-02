<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacts;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        if(isset($_GET['search'])){
            $query=request('search_text');
            $contacts['data'] = Contacts::where('fname', 'LIKE', '%' . $query . '%')
            ->orwhere('mname', 'LIKE', '%' . $query . '%')
            ->orwhere('lname', 'LIKE', '%' . $query . '%')
            ->orwhere('age', 'LIKE', '%' . $query . '%')
            ->orwhere('gen', 'LIKE', '%' . $query . '%')
            ->orwhere('contact', 'LIKE', '%' . $query . '%')
            ->paginate(5);;
        }else{
            $contacts['data'] = Contacts::paginate(5);
        }
        if($contacts['data']->count()>0){
            $contacts['msg']=null;
        }else{
            $contacts['msg']="No Records Found!";
        }

        return view('contacts.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
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
        'fname'=>'required',
        'mname'=> 'required',
        'lname' => 'required',
        'age'=> ['required','numeric'],
        'gen'=> 'required',
        'contact' => ['required','numeric'],
        'contact' => 'numeric'
        ]);

        $contacts = new Contacts([
        'fname' => $request->get('fname'),
        'mname'=> $request->get('mname'),
        'lname'=> $request->get('lname'),
        'age'=> $request->get('age'),
        'gen'=> $request->get('gen'),
        'contact'=> $request->get('contact')
        ]);

        $contacts->save();
        return redirect('/contacts')->with('success', 'Contact Record has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacts = Contacts::find($id);

        return view('contacts.edit', compact('contacts'));
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
        $request->validate([
        'fname'=>'required',
        'mname'=> 'required',
        'lname' => 'required',
        'age'=> ['required','numeric'],
        'gen'=> 'required',
        'contact' => ['required','numeric'],
        'contact' => 'numeric'
        ]);

        $contacts = Contacts::find($id);
        $contacts->fname = $request->get('fname');
        $contacts->mname = $request->get('mname');
        $contacts->lname = $request->get('lname');
        $contacts->age = $request->get('age');
        $contacts->gen = $request->get('gen');
        $contacts->save();

      return redirect('/contacts')->with('success', 'Contact Record has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $contacts = Contacts::find($request->get('del_id'));
        $contacts->delete();

        return redirect('/contacts')->with('success', 'Contact has been deleted Successfully');
    }
}
