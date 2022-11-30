<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Consultation\StoreConsultationRequest;
use App\Http\Requests\Consultation\UpdateConsultationRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Gate;
use Auth;

use App\Models\MasterData\Consultation;
use App\Models\Operational\Doctor;
use Exception;

class ConsultationController extends Controller
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
        abort_if(Gate::denies('consultation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $consultation = Consultation::all();
        return view('pages.backsite.master-data.consultation.index',compact('consultation'));

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
    public function store(StoreConsultationRequest $request)
    {
           $data = $request->all();
        try {
            $consultation = Consultation::create($data);
            alert()->success('Success Message','Successfully added new Consultation!');
            return redirect()->route('pages.backsite.master-data.consultation.index');
        } catch (Exception $th) {
            alert()->error('Error Message', $th->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Consultation $consultation)
    {
        abort_if(Gate::denies('consultation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.master-data.consultation.show',compact('consultation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultation $consultation)
    {
        abort_if(Gate::denies('consultation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.master-data.consultation.edit',compact('consultation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConsultationRequest $request, Consultation $consultation)
    {

        $data= $request->all();
        
        try {
            $consultation->update($data);
            alert()->success('Success Message','Successfully added Updated Consultation!');
            return redirect()->route('pages.backsite.master-data.consultation.index');
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
    public function destroy(Consultation $consultation)
    {
        abort_if(Gate::denies('consultation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            $consultation->delete();
            alert()->success('Success Message','Successfully delete Consultation!');
            return redirect()->route('pages.backsite.master-data.consultation.index');
        } catch (\Throwable $th) {
            alert()->error('Error Message',$th);
            return back();
        }
    }
}
