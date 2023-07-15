<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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


    function store(Request $request)
    {
        $validate = $request->validate(
            [
                'name' => 'required',
                'username' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed|min:6',
                'department_id' => 'required',
                'status_id' => 'required',
            ],
            [
                'name.required' => 'Nhập tên',
                'username.required' => 'Nhập tài khoản',
                'username.unique' => 'Tài khoản đã tồn tài trên hệ thống',
                'email.required' => 'Nhập Email',
                'email.unique' => 'Email đã tồn tài trên hệ thống',
                'email.email' => 'Email phải là một địa chỉ email hợp lệ',
                'password.required' => 'Nhập mật khẩu',
                'password.confirmed' => 'Mật khẩu không khớp',
                'department_id.required' => 'Nhập phòng ban',
                'status_id.required' => 'Nhập trạng thái',
            ]
        );

        $validate['password'] = Hash::make($request->password);
        $users = User::create($validate);
        $arr = [
            'status' => true,
            'data' => $users
        ];

        return response()->json($arr);
    }
}