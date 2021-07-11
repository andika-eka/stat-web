@extends('template.layout')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">statistika</h1>
            <p class="lead">Koefisien korelasi product moment</p>
        </div>
    </div>
    <div class="row">

        <div class="table-responsive shadow p-3 mb-5 bg-white rounded">
            @if(count($moments) > 0)

            <table class="table table-bordered"  width="100%" cellspacing="0" >
                <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>X</th>
                            <th>Y</th>
                            <th>x</th>                           
                            <th>y</th>
                            <th>x^2</th> 
                            <th>y^2</th>
                            <th>xy</th>                              
                        </tr>                    
                </thead>
                <!-- <tfoot>
                    <tr>
                        <th>no</th>
                        <th>Rentangan</th>
                        <th>Frekuensi</th>
                    </tr>
                </tfoot> -->

                <tbody>
                    @for($i = 0; $i < $count; $i++) <tr>
                        <td>{{$i + 1}}</td>
                        <td>{{ $moments[$i]->x}}</td>
                        <td>{{ $moments[$i]->y}}</td>
                        <td>{{ $xmin[$i] }}</td>                                         
                        <td>{{ $ymin[$i] }}</td> 
                        <td>{{ $xSqr[$i] }}</td>                                         
                        <td>{{ $ySqr[$i] }}</td>
                        <td>{{ $XY[$i] }}</td>  
                        </tr>

                        @endfor

                        <tr>
                            <th> Jumlah: </th>
                            <th> {{ $sumX }}</th>
                            <th> {{ $sumY}} </th>
                            <th></th>
                            <th></th>
                            <th> {{ $sumXSqr }}</th>
                            <th> {{ $sumYSqr }}</th>
                            <th> {{ $sumXY }}</th>
                        </tr> 
                        <tr>
                            <th>Rata-Rata: </th>    
                            <th> {{ number_format($avgX,2) }}</th>
                            <th> {{ number_format($avgY,2) }}</th>
                        </tr>                       
                </tbody>
                    
            </table>
            <h6> <b> Korelasi product Moment : </b> &nbsp {{ $corelation }} </h6>  
        </div>

        @else
        <p>data not found :( </p>
        @endif
    </div>
</div>

@endsection
