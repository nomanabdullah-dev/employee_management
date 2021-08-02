<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentStoreRequest;
use App\Http\Requests\DepartmentUpdateRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request){
        $departments     = Department::all();
        if($request->has('search')){
            $departments = Department::where('name', 'LIKE', "%{$request->search}%")->get();
        }
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(DepartmentStoreRequest $request)
    {
        Department::create($request->validated());
        return redirect()->route('departments.index')->with('message','Department Created Successfully!');
    }

    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    public function update(DepartmentUpdateRequest $request, Department $department)
    {
        $department->update($request->validated());
        return redirect()->route('departments.index')->with('message','Department Updated Successfully!');
    }

    public function show(){
        //
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('departments.index')->with('message','Department Deleted Successfully!');
    }
}
