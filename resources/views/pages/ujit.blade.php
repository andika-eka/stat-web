@extends('template.layout')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">statistika</h1>
            <p class="lead">Uji T Berkolerasi</p>
        </div>
    </div>
    <div class="row">

        <div class="table-responsive shadow p-3 mb-5 bg-white rounded">
            @if(1 > 0)

            <table class="table table-bordered"  width="100%" cellspacing="0" >
                <thead class="thead-light">
                    <tr>
                    <th class="w-25">No</th>
                            <th>X1</th>
                            <th>X2</th>     
                    </tr>
                </thead>

                <tbody >
                        @foreach ($ujiT as $i)
                            
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $i->x1 }}</td>                                         
                            <td>{{ $i->x2 }}</td>                              
                        </tr>   
                        @endforeach              
                        <tr >
                            <th> Rata-Rata: </th>   
                            <th>{{ number_format($avgx1, 2) }}</th>        
                            <th>{{ number_format($avgx2, 2) }}</th>                                                
                        </tr>             
                        <tr >
                            <th>Varians:</th>
                            <th>{{ number_format($variansX1, 2) }}</th>
                            <th>{{ number_format($variansX2, 2) }}</th>
                        </tr>
                        <tr >
                            <th>Standar Deviasi:</th>  
                            <th>{{ $sdX1 }}</th>   
                            <th>{{ $sdX2 }}</th>
                        </tr> 
                        <tr >
                            <th>T Hitung: </th>    
                            <th> {{ $resUjiT }}</th>
                        </tr>
                        <tr >
                            <th>T Tabel: </th>    
                            <th> {{ $TTabel }}</th>
                        </tr>
                        <tr >
                            <th>Status H0: </th>    
                            <th> {{ $status }}</th>
                        </tr>
                </tbody >
            </table>
        </div>

        @else
        <p>data not found :( </p>
        @endif
    </div>
</div>

@endsection
