<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterData\TypeUser;
use App\Models\User;
use App\Models\ManagementAccess\Role;
use App\Models\ManagementAccess\DetailUser;

use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

use App\Http\Requests\User\UpdateUserRequest;
use Exception;

class UserController extends Controller
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
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = User::orderBy('created_at', 'desc')->get();
        $type_user = TypeUser::orderBy('name', 'asc')->get();
        $roles = Role::all()->pluck('title', 'id');

        return view('pages.backsite.management-access.user.index', compact('user', 'roles', 'type_user'));
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
    public function store(Request $request)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('role');

        return view('pages.backsite.management-access.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role = Role::all()->pluck('title', 'id');
        $type_user = TypeUser::orderBy('name', 'asc')->get();
        try {
            // $user= new User();
            $detailTypeUser=$user->detailUser->type_user_id;
        } catch (Exception $e) {
            alert()->error('error Message', $e->getMessage());
            $detailTypeUser='';
        }
        // dd($type_user);
        $user->load('role');

        return view('pages.backsite.management-access.user.edit', compact('user', 'role', 'type_user','detailTypeUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->all();

        // update to database
        $user->update($data);

        // update roles
        $user->role()->sync($request->input('role', []));

        // save to detail user , to set type user
        $detail_user = DetailUser::find($user['id']);
        // $detail_user
        if ($detail_user === null) {
            $detailUser=
            [
                'type_user_id' => $request['type_user_id'],
                'user_id' => $user['id'],
            ];
            $detail=DetailUser::create($detailUser);
        }else {
            # code...
            $detail_user->type_user_id = $request['type_user_id'];
            $detail_user->save();
        }

        alert()->success('Success Message', 'Successfully updated user');
        return redirect()->route('backsite.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        alert()->success('Success Message', 'Successfully deleted user');
        return back();
    }
}
