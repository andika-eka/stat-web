@extends('template.layout')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">statistika</h1>
            <p class="lead">Chi-Kuadrat</p>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive shadow p-3 mb-5 bg-white rounded">
            @if(count($data) > 0)
            <table class="table table-bordered text-center " width="100%" cellspacing="0" >
                <thead class="thead-light">
                    <tr>
                        <th rowspan="2">no</th>
                        <th rowspan="2">Data Kelompok</th>
                        <th rowspan="2">Fo</th>
                        <th colspan="2">Batas Kelas</th>
                        <th colspan="2">Nilai Z </th>
                        <th colspan="2">Z Tabel</th>
                        <th rowspan="2">L/Proporsi</th>
                        <th rowspan="2">L*N (fe)</th>
                        <th rowspan="2">(f0-fe)^2/fe</th>
                    </tr>
                    <tr>
                        <th>Bawah</th>
                        <th>Atas</th>
                        <th>Bawah</th>
                        <th>Atas</th>
                        <th>Bawah</th>
                        <th>Atas</th>

                    </tr>
                </thead>
                <!-- <tfoot>
                    <tr>
                        <th>no</th>
                        <th>Data Kelompok</th>
                        <th>Fo</th>
                        <th>Bawah</th>
                        <th>Atas</th>
                        <th>Bawah</th>
                        <th>Atas</th>
                        <th>Bawah</th>
                        <th>Atas</th>
                        <th>L/Proporsi</th>
                        <th>L*N (fe)</th>
                        <th>(f0-fe)^2/fe</th>
                    </tr>
                </tfoot> -->
                <tbody>
                        @for($i = 0; $i < $class; $i++) 
                        <tr>
                            <td>{{$i + 1}}</td>
                            <td>{{$data[$i]}}</td>
                            <td>{{$frek[$i]}}</td>
                            <td>{{$botlim[$i]}}</td>
                            <td>{{$toplim[$i]}}</td>
                            <td>{{$botZval[$i]}}</td>
                            <td>{{$topZval[$i]}}</td>
                            <td>{{$zTabelBot[$i]}}</td>
                            <td>{{$zTabelTop[$i]}}</td>
                            <td>{{$Lpps[$i]}}</td>
                            <td>{{$Fe[$i]}}</td>
                            <td>{{$kai[$i]}}</td>
                        </tr>
                        @endfor
                </tbody>
            </table>
            <h6>Total chi: {{$chi}} </h6>
        </div>
        @else
        <p>data not found :( </p>
        @endif
    </div>
</div>

@endsection
