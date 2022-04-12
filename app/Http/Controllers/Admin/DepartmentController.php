<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Level;

class DepartmentController extends Controller
{
    protected $model ;
    protected $viewsDomain = 'admin/departments.';
    protected $url = 'admin/departments';
    public function __construct()
    {
        $this->model = new Department();
    }
    public function view($view, $params = [])
    {
        return view($this->viewsDomain . $view, $params);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        //
        $records = $this->model->where(function ($q) use ($request)
        {
            if ($request->name) {
                

                $q->where('name', 'LIKE', '%' . $request->name . '%');
            
        }


        })->latest()->paginate(6);
        return $this->view('index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
        $levels = Level::select('id', 'name')->get();
        return view('admin.departments.create', compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        //
        $rules =
            [
                'name' => 'required',
                'level_id' => 'required',
            ];

        $error_sms =
            [
                'name.required' => 'الرجاء ادخال الاسم ',
                'level_id' => 'الرجاء اختيار قيمه ',
            ];

        $data = validator()->make($request->all(), $rules, $error_sms);

        if ($data->fails()) {
            return back()->withInput()->withErrors($data->errors());
        }

        session()->flash('success', 'تمت الاضافة بنجاح');
        return redirect()->route('departments.index');

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
        //
        $levels = Level::findOrFail($id);
        return view('admin.departments.edit', compact('levels'));
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
        //
        $rules =
            [
                'name' => 'required',
                'level_id' => 'required',
            ];

        $error_sms =
            [
                'name.required' => 'الرجاء ادخال الاسم ',
                'level_id' => 'الرجاء اختيار قيمه ',
            ];


        $data = validator()->make($request->all(), $rules, $error_sms);

        if ($data->fails()) {
            return back()->withInput()->withErrors($data->errors());
        }

        $record = $this->model->findOrFail($id);


        session()->flash('success', 'تمت تحديث بنجاح');
        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $record = $this->model->findOrFail($id);
        $record->delete();

        $data = [
            'status' => 1,
            'message' => 'تم الحذف بنجاح',
            'id' => $id
        ];

        return redirect()->route('departments.index');

    }

  

}




