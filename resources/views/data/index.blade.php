@extends('template.layout')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">statistika</h1>
            <p class="lead">data</p>

        </div>
    </div>

    <div class="row">
        <div class="col">
            @if(count($data) > 0)
            <table class="table table-dark" style=" box-shadow: 10px 10px 5px grey; border: 2px solid grey; border-radius: 10px;">
                <thead>
                    <tr>
                        <th scope="col">nama</th>
                        <th scope="col">nilai 1</th>
                        <th scope="col">nilai 2</th>
                        <th scope="col">nilai 3</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>
                            <div title="{{$item -> keterangan }}">{{$item -> nama }} </div>
                        </td>

                        <td>{{$item -> nilai_1 }}</td>
                        <td>{{$item -> nilai_2 }}</td>
                        <td>{{$item -> nilai_3 }}
                        <td>
                            <a href="/Data/{{$item -> id}}/edit" class="btn btn-primary" name='edit'>edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>data not found :( </p>
            @endif
        </div>
        <div class="col col col-lg-2 text-center" >
            <div class="card border-primary bg-dark mb-3 " style="min-width: 30rem; color : white; box-shadow: 10px 10px 5px grey; border: 2px solid grey; border-radius: 10px;">
                <div class="card-header"><b>jumlah data</b></div>
                <div class="card-body">
                    <h5 class="card-title">{{count($data)}}</h5>
                    <a href="/Data/create" class="btn btn-outline-primary" name='new'>new entry</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
