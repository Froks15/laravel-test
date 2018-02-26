<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //dd(Employee::find(1)->company()->get());
        $employees = Employee::paginate(10);

        return view('employees.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employees.create');
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

        $validatedData = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'nullable|email',
                'phone' => 'nullable|numeric',
                'companies_id' => 'exists:companies,id'
            ]);

        $employee = new Employee;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->companies_id = $request->companies_id;
        $employee->email = $request->email;
        $employee->phone = $request->phone;

        $employee->save();

        return redirect()->action('EmployeesController@index')->withInput();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
        return view('employees.show', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
        return view('employees.edit', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
        $validatedData = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'nullable|email',
                'phone' => 'nullable|numeric'
            ]);

        $employee = Employee::find($employee->id);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->companies_id = $request->companies_id;
        $employee->email = $request->email;
        $employee->phone = $request->phone;

        $employee->save();

        return redirect()->action('EmployeesController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
        $employee->delete();
        return redirect()->action('EmployeesController@index');
    }
}
