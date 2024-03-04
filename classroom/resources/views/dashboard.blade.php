@extends('master')
@section('konten')
<h4>Henlo! <b>{{Auth::user()->name}}</b>!
    Kamu Login sebagai <b>{{Auth::user()->role}}</b>.
</h4>
@endsection