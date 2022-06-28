<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\File;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view("company.index", compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view("company.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $validData = $request->validated();

        if($request->file('logo')){
            $validData["logo"] = $this->uploadLogo();
        }

        Company::create($validData);

        session()->flash('success', 'Company created successfully.');

        return redirect(route('companies.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::where("id", $id)->first();

        return view("company.show", compact("company"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::where("id", $id)->first();
        return view("company.edit", compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $company = Company::where("id", $id)->first();

        if(isset($company)) {
            $validData = $request->validated();

            if($request->file('logo')){
                $validData["logo"] = $this->uploadLogo();

                if(isset($company->logo)) {
                    $filePath = public_path("logo/" . $company->logo);
                    if(is_file($filePath)) {
                        unlink($filePath);
                    }
                }
            }

            $company->update($validData);

            session()->flash('success', 'Company updated successfully.');

            return redirect(route('companies.index'));
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
        $company = Company::where("id", $id)->first();

        if(isset($company)){
            if(isset($company->logo)){
                $filePath = public_path("logo/" . $company->logo);
                if(is_file($filePath)) {
                    unlink($filePath);
                }
            }
            $company->delete();

            session()->flash('success', 'Company deleted successfully.');

        }else{
            session()->flash('error', 'Company not found.');
        }
        return redirect(route('companies.index'));
    }


    protected function uploadLogo()
    {
        $file = request()->file('logo');
        $fileName = time() . "-" . $file->getClientOriginalName();
        $file->move(public_path('logo'), $fileName);
        return $fileName;
    }
}
