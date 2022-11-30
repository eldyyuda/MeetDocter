<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Gate;
use Auth;
use App\Http\Requests\Specialist\StoreSpecialistRequest;
use App\Http\Requests\Specialist\UpdateSpecialistRequest;

use App\Models\MasterData\Specialist;
use Exception;

class SpecialistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        abort_if(Gate::denies('specialist_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $specialist=Specialist::orderby('created_at','desc')->get();
        // dd($specialists);
        return view('pages.backsite.master-data.specialist.index',compact('specialist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecialistRequest $request)
    {
        $data = $request->all();
        try {
            $specialists = Specialist::create($data);
            alert()->success('Success Message','Successfully added new Specialist!');
            return redirect()->route('pages.backsite.master-data.specialist.index');
        } catch (Exception $th) {
            alert()->error('Error Message',$th);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Specialist $specialist)
    {
        // $specialists =
        // dd($specialist);
        abort_if(Gate::denies('specialist_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('pages.backsite.master-data.specialist.show',compact('specialist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialist $specialist)
    {
        // dd($specialist);
        abort_if(Gate::denies('specialist_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('pages.backsite.master-data.specialist.edit',compact('specialist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecialistRequest $request, Specialist $specialist)
    {
        $data= $request->all();
        
        try {
            $specialist->update($data);
            alert()->success('Success Message','Successfully added Updated Specialist!');
            return redirect()->route('pages.backsite.master-data.specialist.index');
        } catch (Exception $th) {
            alert()->error('Error Message', $th->getMessage());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialist $specialist)
    {
        abort_if(Gate::denies('specialist_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            $specialist->delete();
            alert()->success('Success Message','Successfully delete Specialist!');
            return redirect()->route('pages.backsite.master-data.specialist.index');
        } catch (Exception $th) {
            alert()->error('Error Message',$th->getMessage());
            return back();
        }
        
    }
}
