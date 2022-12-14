<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salary = Salary::all();
        return view('salary.index', compact('salary'));
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
        try {
            Salary::create($request->all());
            return back(); 
        } catch (\Exception $e) {
            new Error($e);
        }
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
        try {
            $salary = Salary::findOrFail($id);
            return ['status' => true, 'kode' => 1, 'data' => $salary, 'pesan' => 'Data Ditemukan'];
        } catch (\Exception $e) {
            return ['status' => false, 'kode' => 2, 'pesan' => 'Data Tidak Ditemukan'];
        }
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
        $positions = Salary::find($id);
        $data = $request->all();
        try {
            $positions->update($data);
            return back();
        } catch (\Exception $e) {
            return back();
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
        $position = Salary::find($id);
        try {
            $position->delete();
            return back();
        } catch (\Exception $e) {
            return back();
        }
    }
}
