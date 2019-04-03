<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        if(request('search')){
            $query=request('search_text');
            $students['data']= Students::where('fname','LIKE','%'.$query.'%')
            ->orwhere('mname','LIKE','%'.$query.'%')
            ->orwhere('lname','LIKE','%'.$query.'%')
            ->orwhere('course','LIKE','%'.$query.'%')
            ->orwhere('yr','LIKE','%'.$query.'%')
            ->orwhere('address','LIKE','%'.$query.'%')
            ->orwhere('s_id','LIKE','%'.$query.'%')
            ->paginate(5);
        }else{
            $students['data'] = Students::paginate(5);
        }
        

        if($students['data']->count()<=0){
            $students['msg']="No Records Found";
        }
        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
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
            'fname' =>'alpha|required',
            'mname' =>'required',
            'lname' =>'required',
            'course' =>'required',
            'yr' =>'required|max:5',
            'address' =>'required'
        ],
        [
            'fname.required' => 'The first name is required.',
            'mname.required' => 'The middle name field is required.',
            'lname.required' => 'The last name field is required.',
            'yr.required' => 'The year field is required.',
            'yr.max' => 'The year may not greater than 5 charaters.'
        ]);

        $students= new Students([
            'fname'=>$request->get('fname'),
            'mname'=>$request->get('mname'),
            'lname'=>$request->get('lname'),
            'course'=>$request->get('course'),
            'yr'=>$request->get('yr'),
            'address'=>$request->get('address')
        ]); 

        $students->save();
        return redirect('/students')->with('success','New Student Successfully Added');
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
        $student=Students::find($id);

        return view('students.edit',compact('student'));
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
            'fname' =>'alpha|required',
            'mname' =>'required',
            'lname' =>'required',
            'course' =>'required',
            'yr' =>'required|max:5',
            'address' =>'required'
        ],
        [
            'fname.required' => 'The first name is required.',
            'mname.required' => 'The middle name field is required.',
            'lname.required' => 'The last name field is required.',
            'yr.required' => 'The year field is required.',
            'yr.max' => 'The year may not greater than 5 charaters.'
        ]);

        $student= Students::find($id);
        $student->fname=$request->get('fname');
        $student->mname=$request->get('mname');
        $student->lname=$request->get('lname');
        $student->course=$request->get('course');
        $student->yr=$request->get('yr');
        $student->address=$request->get('address');
        $student->save();

        return redirect('/students')->with('success','Student Record Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $student=Students::find($request->get('id'));
        $student->delete();

        return redirect('/students')->with('success','Student Record Deleted');
    }
}
