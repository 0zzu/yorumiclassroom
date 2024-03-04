<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
class SoalCon extends Controller
{
    public function index()
    {
        $soal = DB::table('soal')->get();
        return view('soal', ['soal' => $soal]);
    }
    public function storeinput(Request $request)
    {
        // insert data ke table soal
        DB::table('soal')->insert([
            'judulmateri' => $request->judulmateri,
            'deskripsisoal' => $request->deskripsisoal,
            'bataswaktu' => $request->bataswaktu
        ]);
        // alihkan halaman ke route soal
        Session::flash('message', 'Input Berhasil.');
        return redirect('/soal');
    }
    public function storeupdate(Request $request)
    {
        // update data soal
        DB::table('soal')->where('idsoal', $request->idsoal)->update([
            'judulmateri' => $request->judulmateri,
            'deskripsisoal' => $request->deskripsisoal,
            'bataswaktu' => $request->bataswaktu
        ]);
        // alihkan halaman ke halaman produk
        return redirect('/soal');
    }
    public function delete($id)
    {
        // mengambil data user berdasarkan id yang dipilih
        DB::table('soal')->where('idsoal', $id)->delete();
        return redirect('/soal');
    }
}