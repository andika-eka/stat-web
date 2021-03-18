@extends('template.layout')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">statitika</h1>
            <p class="lead">hasil pengolahan data</p>

        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header"><b>nilai 1 maximum</b></div>
                        <div class="card-body">
                            <h5 class="card-title">{{$max1}}</h5>

                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header"><b>nilai 2 maximum</b></div>
                        <div class="card-body">
                            <h5 class="card-title">{{$max2}}</h5>

                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header"><b>nilai 3 maximum</b></div>
                        <div class="card-body">
                            <h5 class="card-title">{{$max3}}</h5>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="card text-white bg-danger  mb-3" style="max-width: 18rem;">
                        <div class="card-header"><b>nilai 1 minimum</b></div>
                        <div class="card-body">
                            <h5 class="card-title">{{$min1}}</h5>

                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card text-white bg-danger  mb-3" style="max-width: 18rem;">
                        <div class="card-header"><b>nilai 2 minimum</b></div>
                        <div class="card-body">
                            <h5 class="card-title">{{$min2}}</h5>

                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card text-white bg-danger  mb-3" style="max-width: 18rem;">
                        <div class="card-header"><b>nilai 3 minimum</b></div>
                        <div class="card-body">
                            <h5 class="card-title">{{$min3}}</h5>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="card border-dark mb-3" style="max-width: 18rem;">
                        <div class="card-header"><b>nilai 1 rata-rata</b></div>
                        <div class="card-body">
                            <h5 class="card-title">{{$avg1}}</h5>

                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card border-dark mb-3" style="max-width: 18rem;">
                        <div class="card-header"><b>nilai 2 rata-rata</b></div>
                        <div class="card-body">
                            <h5 class="card-title">{{$avg2}}</h5>

                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card border-dark mb-3" style="max-width: 18rem;">
                        <div class="card-header"><b>nilai 3 rata-rata</b></div>
                        <div class="card-body">
                            <h5 class="card-title">{{$avg3}}</h5>

                        </div>
                    </div>
                </div>
            </div>

            <hr>


            <div class="container">
                <div class="row">
                    <div class="col-lg d-flex justify-content-center text-center">
                        <div class="card text-white bg-primary " style="min-width: 30rem;">
                            <div class="card-header"><b>nilai maximum</b></div>
                            <div class="card-body">
                                <h5 class="card-title">{{max($max1,$max2,$max3)}}</h5>

                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg d-flex justify-content-center text-center">
                        <div class="card text-white bg-danger " style="min-width: 30rem;">
                            <div class="card-header"><b>nilai minimum</b></div>
                            <div class="card-body">
                                <h5 class="card-title">{{min($min1,$min2,$min3)}}</h5>

                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg d-flex justify-content-center text-center">
                        <div class="card border-dark " style="min-width: 30rem;">
                            <div class="card-header"><b>nilai rata-rata</b></div>
                            <div class="card-body">
                                <h5 class="card-title">{{$avgAll}}</h5>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<hr>
<div class="container text-center">
    <div class="row">
        <div class="col-sm">
            <table class="table table-striped table-dark">
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
            <table class="table table-striped table-dark">
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
@endsection
