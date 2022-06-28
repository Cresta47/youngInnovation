<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with("company")->paginate(10);

        // dd($employees->toArray());
        return view("employee.index", compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::pluck("name", "id");
        $companies->prepend("Select Company", "");

        return view("employee.create", compact("companies"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $employeeData = $request->validated();

        Employee::create($employeeData);

        session()->flash('success', 'Employee created successfully.');

        return redirect(route('employees.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::where("id", $id)->first();

        return view("employee.show", compact("employee"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::where("id", $id)->first();

        $companies = Company::pluck("name", "id");
        $companies->prepend("Select Company", "");


        return view("employee.edit", compact("employee", "companies"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $employee = Employee::where("id", $id)->first();

        if(isset($employee)) {
            $validData = $request->validated();

            $employee->update($validData);

            session()->flash('success', 'Employee updated successfully.');

            return redirect(route('employees.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::where("id", $id)->first();

        if(isset($employee)){

            $employee->delete();

            session()->flash('success', 'Employee deleted successfully.');
        }else {
            session()->flash('error', 'Employee not found.');
        }
        return redirect(route('employees.index'));
    }
}
