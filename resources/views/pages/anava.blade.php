@extends('template.layout')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">statistika</h1>
            <p class="lead">Uji Anava</p>
        </div>
    </div>
    <div class="row">

        <div class="table-responsive shadow p-3 mb-5 bg-white rounded">
            @if(1 > 0)

            <table class="table table-bordered"  width="100%" cellspacing="0" >
                <thead class="thead-light">
                            <th>No</th>
                            <th>X1</th>
                            <th>X2</th>  
                            <th>X3</th>   
                            <th>X1^2</th>
                            <th>X2^2</th>   
                            <th>X3^2</th>
                            <th>Xt</th>
                            <th>Xt^2</th>
                </thead>
                

                <tbody>
                        @for ($i = 0; $i < $count; $i++) <tr>                           
                        <tr>
                            <th>{{ $i+1  }}</th>
                            <td>{{ $Anava[$i]->x1 }}</td>                                         
                            <td>{{ $Anava[$i]->x2 }}</td> 
                            <td>{{ $Anava[$i]->x3 }}</td>                             
                            <td>{{ $X1Sqr[$i]}}</td>
                            <td>{{ $X2Sqr[$i]}}</td>
                            <td>{{ $X3Sqr[$i]}}</td>
                            <td>{{ $Xtotal[$i] }}</td>
                            <td>{{ $XtotalSqr[$i] }}</td>
                        @endfor 
                        
                    <tr >
                        <th> Sigma: </th>                                                                              
                        <th> {{$sumX1}} </th>
                        <th> {{$sumX2}}</th>
                        <th> {{$sumX3}}</th>
                        <th>{{$sigmaX1Sqr}}</th>
                        <th>{{$sigmaX2Sqr}}</t>
                        <th>{{$sigmaX3Sqr}}</th>
                        <th>{{$sigmaXtotal}}</th>
                        <th>{{$sigmaXtotalSqr}}</th>
                    </tr>       
                    <tr>
                        <th> Rata-Rata: </th>    
                        <th>{{$avgX1}}</th>
                        <th>{{$avgX2}}</th>
                        <th>{{$avgX2}}</th>
                    </tr>                             
                </tbody>
                    
            </table>

            <hr>

            
            <table class="table table-bordered"  width="100%" cellspacing="0" >
                <thead class="thead-light">
                            <th>Sumber Variasi</th>
                            <th>JK</th>
                            <th>DK</th>
                            <th>RJK</th>
                            <th>FHitung</th>
                            <th>Ftabel (5%)</th>
                            <th>Keterangan</th>                                                                                                     
                </thead>
                

                <tbody>
                    <tr>
                        <th>Antar :</th>
                        <td>{{ number_format($JKA, 2) }}</td>
                        <td>{{ number_format($DKA, 2) }}</td>
                        <td>{{ number_format($RJKA, 2) }}</td>
                        <td>{{ number_format($F, 2) }}</td>
                        <td> {{ $fTabel}} </td>
                        <td> {{ $status }}</td>                                                                                                                                                               
                    </tr>         
                        
                    <tr >
                        <th>Dalam :</th>
                        <td>{{ number_format($JKD, 2) }}</td>
                        <td>{{ number_format($DKD, 2) }}</td>
                        <td>{{ number_format($RJKD,2) }}</td>
                        <td> - </td>
                        <td> - </td>
                        <td></td>
                    </tr>       
                    <tr >
                        <th>Total :</th>
                        <td>{{ number_format($JKT, 2) }}</td>
                        <td>{{ number_format($DKT, 2) }}</td>
                        <td> - </td>
                        <td> - </td>
                        <td> - </td>
                        <td></td>
                    </tr>                          
                </tbody>
                    
            </table>
        </div>

        @else
        <p>data not found :( </p>
        @endif
    </div>
</div>

@endsection
