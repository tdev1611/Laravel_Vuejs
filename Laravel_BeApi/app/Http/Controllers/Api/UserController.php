<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    function index()
    {

        $users = User::join('users_status', 'users.status_id', '=', 'users_status.id')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('users.*', 'users_status.name as status_name', 'departments.name as department_name')
            ->get();
        return response()->json($users);
    }

    function create()
    {
        $user_status = DB::table('users_status')
            ->select(
                'id as value',
                'name as label'
            )->get();
        $departments = DB::table('departments')->select(
            'id as value',
            'name as label'
        )->get();
        return response()->json(
            [
                'user_status' => $user_status,
                'departments' => $departments
            ]
        );
    }
}