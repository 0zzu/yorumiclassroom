@extends('master')
@section('konten')
    <!DOCTYPE html>
    <html>

    <head>
        <title>Nilai</title>
    </head>

    <body>
        <h2>Data Nilai</h2>
        <br />
        <table class="table table-dark table-hover m-lg-2">
            <tr>
                <th>ID Tugas</th>
                <th>Nama Pengguna</th>
                <th>Jawaban Tugas</th>
                <th>Nilai</th>
                <th>Status</th>
            </tr>
            @foreach ($nilai as $n)
                <tr>
                    <td> {{ $n->idsoal }} </td>
                    <td> {{ $n->name }} </td>
                    <td> {{ $n->jawabansoal }} </td>
                    <td> {{ $n->nilai }} </td>
                    <td>
                        @if (Auth::user()->role == 'admin')
                            @if ($n->status != 'selesai')
                                <button class="btn btn-danger" data-toggle="modal"
                                    data-target="#UpdateStatus{{ $n->idnilai }}"> {{ $n->status }}</button>
                            @elseif($n->status == 'selesai')
                                <button class="btn btn-success">{{ $n->status }}</button>
                            @endif
                        @else
                            <button class="btn btn-primary">{{ $n->status }}</button>
                        @endif
                    </td>
                </tr>
                <!-- Ini tampil form update Status -->
                <div class="modal fade" id="UpdateStatus{{ $n->idnilai }}"tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Status</h1>
                            </div>
                            <div class="modal-body">
                                <form action="/nilai/storeupdate" method="post" class="form-floating">
                                    @csrf
                                    <input type="hidden" name="idnilai"id="idnilai" readonly class="form-control"
                                        value="{{ $n->idnilai }}">
                                    <div class="form-floating">
                                        <label for="floatingInputValue">Nilai Tugas</label>
                                        <input type="text" name="nilai"required="required" class="form-control"
                                            value="{{ $n->nilai }}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Updates</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </table>
        </div>
    </body>

    </html>
@endsection
