@extends('template.layout')


@section('content')
<div class="container">

    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">statistika</h1>
            <p class="lead">hasil pengolahan data</p>

        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-4">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <div class="card  border-primary mb-3" style="box-shadow: 10px 10px 5px; ">
                            <div class="card-header"><b>nilai maximum</b></div>
                            <div class="card-body">
                                <h6 class="card-title">nilai 1 : {{$max1}}</h6>
                                <h6 class="card-title">nilai 2 : {{$max2}}</h6>
                                <h6 class="card-title">nilai 3 : {{$max3}}</h6>
                                <h6 class="card-title">nilai total : {{max($max1,$max2,$max3)}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="card  border-danger  mb-3" style="box-shadow: 10px 10px 5px;">
                            <div class="card-header"><b>nilai minimum</b></div>
                            <div class="card-body">
                                <h6 class="card-title">nilai 1 : {{$min1}}</h6>
                                <h6 class="card-title">nilai 2 : {{$min2}}</h6>
                                <h6 class="card-title">nilai 3 : {{$min3}}</h6>
                                <h6 class="card-title">nilai total : {{min($min1,$min2,$min3)}}</h6>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="card border-dark mb-3" style="box-shadow: 10px 10px 5px;">
                            <div class="card-header"><b>nilai rata-rata</b></div>
                            <div class="card-body">
                                <h6 class="card-title">nilai 1 : {{$avg1}}</h6>
                                <h6 class="card-title">nilai 2 : {{$avg2}}</h6>
                                <h6 class="card-title">nilai 3 : {{$avg3}}</h6>
                                <h6 class="card-title">nilai total : {{$avgAll}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-8">
            <div class="container text-center" >

                <div class="row">
                    <div class="col-sm">
                        <h4>nilai 1</h4>
                        <table class="table table-striped table-dark" >
                            <thead>
                                <tr>
                                    <td scope="col">nilai</td>
                                    <td scope="col">Frekuensi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($frek1 as $frek)

                                <tr>
                                    <td> {{ $frek->nilai }} </td>
                                    <td> {{ $frek->frek }}</td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm">
                        <h4>nilai 2</h4>
                        <table class="table table-striped table-dark">
                            <thead>
                                <tr>
                                    <td scope="col">nilai</td>
                                    <td scope="col">Frekuensi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($frek2 as $frek)

                                <tr>
                                    <td> {{ $frek->nilai }} </td>
                                    <td> {{ $frek->frek }}</td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm">
                        <h4>nilai 3</h4>
                        <table class="table table-striped table-dark">
                            <thead>
                                <tr>
                                    <td scope="col">nilai</td>
                                    <td scope="col">Frekuensi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($frek3 as $frek)

                                <tr>
                                    <td> {{ $frek->nilai }} </td>
                                    <td> {{ $frek->frek }}</td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    @endsection
