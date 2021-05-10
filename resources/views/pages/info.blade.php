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
                                <h3 class="card-title"> {{$max1}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="card  border-danger  mb-3" style="box-shadow: 10px 10px 5px;">
                            <div class="card-header"><b>nilai minimum</b></div>
                            <div class="card-body">
                                <h3 class="card-title"> {{$min1}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="card border-dark mb-3" style="box-shadow: 10px 10px 5px;">
                            <div class="card-header"><b>nilai rata-rata</b></div>
                            <div class="card-body">
                                <h3 class="card-title"> {{$avg1}}</h3>
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
                        <h4>Table frekuensi</h4>
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
                    
                </div>
            </div>
        </div>
    </div>

    <hr>
</div>
    @endsection
