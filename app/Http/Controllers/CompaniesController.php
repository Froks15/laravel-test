<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //dd(Company::find(52)->employees()->get());
        $companies = Company::paginate(10);
        return view('companies.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('companies.create');
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
                'name' => 'required',
                'logo' => 'image:jpg,png|dimensions:min_width=100, min_height=100',
                'email' => 'nullable|email'
            ]);

        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        if ($request->has('logo')) {
            $path = $request->logo->store('/', 'image');
            $company->logo = $path;
        }
        $company->save();


        return redirect()->action('CompaniesController@index')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
        return view('companies.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
        return view('companies.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
        $validatedData = $request->validate([
                'name' => 'required',
                'logo' => 'image:jpg,png|dimensions:min_width=100, min_height=100',
                'email' => 'nullable|email'
            ]);

        $company = Company::find($company->id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        if ($request->has('logo')) {
            if (Storage::disk('image')->exists( $company->logo )) {
                Storage::disk('image')->delete( $company->logo );
            }
            $path = $request->logo->store('/', 'image');
            $company->logo = $path;
        }
        $company->save();
        return redirect()->action('CompaniesController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        if (Storage::disk('image')->exists( $company->logo )) {
                Storage::disk('image')->delete( $company->logo );
            }
        return redirect()->action('CompaniesController@index');
    }
}
