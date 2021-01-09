<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Services\UserService;
use App\Models\User;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->middleware('auth');
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('pages.user.users')->with('users',$users);
    }
     /**
     * It will return a HTML for the Modal container
     *
     * @return Body
     */
    public function userModal(Request $request)
    {
        return $this->sendJsonResponse($this->userService->userModal($request));
    }

    /**
     * Method for the Adding Users
     *
     * @return Body
     */
    public function confirmAddUser(Request $request)
    {
        return $this->sendJsonResponse($this->userService->confirmAdduser($request));
    }


    /**
     * It will return a HTML for the Modal container for confirmation of deletion
     *
     * @return Body
     */
    public function userDeleteModal(Request $request)
    {
        return $this->sendJsonResponse($this->userService->userDeleteModal($request));
    }
    /**
     * Method for the Deleting Users
     *
     * @return Body
     */
    public function confirmDeleteUser(Request $request)
    {
        return $this->sendJsonResponse($this->userService->confirmDeleteUser($request));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
