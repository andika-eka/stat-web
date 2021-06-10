@extends('template.layout')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">statistika</h1>
            <p class="lead">Lilliefors</p>
        </div>
    </div>
    <div class="row">

        <div class="table-responsive shadow p-3 mb-5 bg-white rounded">
            <table class="table table-bordered"  width="100%" cellspacing="0" >
                <thead class="thead-light">
                    <tr>
                        <th>no</th>
                        <th>Yi</th>
                        <th>Fkum</th>
                        <th>Zi</th>
                        <th>F(Zi)</th>
                        <th>S(Zi)</th>
                        <th>IF(Zi)-S(Zi)I</th>
                    </tr>
                </thead>

                <tbody>
                @for($i = 0; $i < $countData; $i++) 
                    <tr>
                        <td>{{$i + 1}}</td>
                        <td>{{$frek[0][$i]->nilai_1}}</td>
                        <td>{{$frekKum[$i]}}</td>
                        <td>{{$Zi[$i]}}</td>
                        <td>{{$F_zi[$i]}}</td>
                        <td>{{$S_zi[$i]}}</td>
                        <td>{{$LLF[$i]}}</td>
                    </tr>

                @endfor
                </tbody>
            </table>
            <h6> n : {{$dataNum}}</h6>
            <h6> Lilliefors : {{$totalLLF}}</h6>
        </div>

    </div>
</div>

@endsection