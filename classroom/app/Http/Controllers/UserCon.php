<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserCon extends Controller
{
    public function index()
    {
        $user = DB::table('users')->get();
        return view('user', ['user' => $user]);
    }
    public function delete($id)
    {
        // mengambil data user berdasarkan id yang dipilih
        DB::table('users')->where('id', $id)->delete();
        return redirect('/user');
    }
}