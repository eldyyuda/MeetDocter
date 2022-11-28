<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Gate;
use Auth;
use Illuminate\Support\Facades\File;
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
        abort_if(Gate::denies('doctor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $doctors= Doctor::orderby('created_at','desc')->get();
        $specialists = Specialist::orderby('name','asc')->get();

        return view('pages.backsite.operational.doctor.index',compact('doctors','specialists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request)
    {
        try {
            $data = $request->all();

            // re format before push to table
            $data['fee'] = str_replace(',', '', $data['fee']);
            $data['fee'] = str_replace('IDR ', '', $data['fee']);
    
            // upload process here
            $path = public_path('app/public/assets/file-doctor');
            if(!File::isDirectory($path)){
                $response = Storage::makeDirectory('public/assets/file-doctor');
            }
    
            // change file locations
            if(isset($data['photo'])){
                $data['photo'] = $request->file('photo')->store(
                    'assets/file-doctor', 'public'
                );
            }else{
                $data['photo'] = "";
            }
    
            // store to database
            $doctor = Doctor::create($data);
    
            alert()->success('Success Message', 'Successfully added new doctor');
            return redirect()->route('backsite.doctor.index');
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
        abort_if(Gate::denies('doctor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.operational.doctor.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        abort_if(Gate::denies('doctor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $specialists = Specialist::orderby('name', 'ASC')->get();
        return view('pages.backsite.operational.doctor.edit', compact('doctor','specialists'));
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
            $data = $request->all();

        // re format before push to table
        $data['fee'] = str_replace(',', '', $data['fee']);
        $data['fee'] = str_replace('IDR ', '', $data['fee']);

        // upload process here
        // change format photo
        if(isset($data['photo'])){

             // first checking old photo to delete from storage
            $get_item = $doctor['photo'];

            // change file locations
            $data['photo'] = $request->file('photo')->store(
                'assets/file-doctor', 'public'
            );

            // delete old photo from storage
            $data_old = 'storage/'.$get_item;
            if (File::exists($data_old)) {
                File::delete($data_old);
            }else{
                File::delete('storage/app/public/'.$get_item);
            }

        }

        // update to database
        $doctor->update($data);

        alert()->success('Success Message', 'Successfully updated doctor');
        return redirect()->route('backsite.doctor.index');
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
