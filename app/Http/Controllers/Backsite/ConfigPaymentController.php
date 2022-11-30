<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigPayment\UpdateConfigPaymentRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// use Gate;
use Auth;
use App\Http\Requests\Doctor\StoreDoctorRequest;
use App\Http\Requests\Doctor\UpdateDoctorRequest;

use App\Models\MasterData\ConfigPayment;
use App\Models\Operational\Doctor;
use Exception;

class ConfigPaymentController extends Controller
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
        $configPayment=ConfigPayment::all();
        return view('pages.backsite.master-data.config-payment.index',compact('configPayment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return abort(404);
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
        return abort(404);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ConfigPayment $configPayment)
    {
        return view('pages.backsite.master-data.config-payment.index', compact('configPayment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConfigPaymentRequest $request, ConfigPayment $configPayment)
    {
        $data= $request->all();
        
        try {
            $configPayment->update($data);
            alert()->success('Success Message','Successfully added Updated Specialist!');
            return redirect()->route('pages.backsite.master-data.config-payment.index');
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
    public function destroy($id)
    {
        return abort(404);
    }
}
