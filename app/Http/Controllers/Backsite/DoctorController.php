<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// use Gate;
use Auth;
use App\Http\Requests\Doctor\StoreDoctorRequest;
use App\Http\Requests\Doctor\UpdateDoctorRequest;

use App\Models\MasterData\Specialist;
use App\Models\Operational\Doctor;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors= Doctor::orderby('created_at','desc')->get();
        $specialists = Specialist::orderby('name','asc')->get();

        return view('pages.backsite.operational.doctor.index',compact('doctors','specialists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StoreDoctorRequest $request)
    {
        $data = $request->all();
        try {
            $doctors=Doctor::create($data);
            alert()->success('Success Message','Successfully added new Doctor!');
            return redirect()->route('pages.backsite.operational.doctor.index');
        } catch (\Throwable $th) {
            alert()->error('Error Message',$th);
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request)
    {
        $data=$request->all();
        try {
            $doctors= Doctor::create($data);
            alert()->success('Success Message','Successfully added a new Doctor!!');
            return redirect()->route('pages.backsite.operational.doctor');
        } catch (\Throwable $th) {
            alert()->success('Error Message',$th);
            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return view('pages.backsite.operational.doctor', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $specialists = Specialist::orderby('name', 'ASC')->get();
        return view('pages.backsite.operational.doctor', compact('doctor','specialists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        $data= $request->all();
        
        try {
            $doctor->update($data);
            alert()->success('Success Message','Successfully added Updated Doctor!');
            return redirect()->route('pages.backsite.master-data.operational.index');
        } catch (\Throwable $th) {
            alert()->error('Error Message',$th);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        try {
            $doctor->delete();
            alert()->success('Success Message','Successfully delete Specialist!');
            return redirect()->route('pages.backsite.master-data.specialist.index');
        } catch (\Throwable $th) {
            alert()->error('Error Message',$th);
            return back();
        }
    }
}
