<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class NilaiCon extends Controller
{
public function index()
{
if (Auth::user()->role == 'admin') {
$nilai = DB::table('nilai')
->join('users', 'users.id', '=', 'nilai.iduser')
->get();
return view('nilai', ['nilai' => $nilai]);
} else {
$nilai = DB::table('nilai')
->join('users', 'users.id', '=', 'nilai.iduser')
->where('iduser', Auth::user()->id)
->get();

return view('nilai', ['nilai' => $nilai]);
}
}
public function storeupdate(Request $request)
{
// update data nilai
DB::table('nilai')->where('idnilai', $request->idnilai)->update([
'status' => 'selesai',
'nilai' => $request->nilai
]);
// alihkan halaman ke halaman nilai
return redirect('/nilai');
}
public function storeinput(Request $request)
{
// insert data ke table nilai
DB::table('nilai')->insert([
'idsoal' => $request->idsoal,
'iduser' => Auth::user()->id,
'jawabansoal' => $request->jawabansoal,
'status' => 'Menunggu Penilaian',
'nilai' => '0'
]);
// alihkan halaman ke route soal
Session::flash('message', 'Input Berhasil.');
return redirect('/nilai');
}
}