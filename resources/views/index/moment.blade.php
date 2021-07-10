@extends('template.layout')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">statistika</h1>
            <p class="lead">data moment</p>

        </div>
    </div>

    <div class="row">

        <div class="col">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Table data moment
                </div>
                <div class="card-body">
                    <div class="table-responsive">


                        @if(count($moments) > 0)

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>no</th>
                                    <th>X</th>
                                    <th>Y</th>
                                    
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>no</th>
                                    <th>X</th>
                                    <th>Y</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($moments as $item)
                                <td>{{$i}}</td>
                                <td>{{$item->x}}</td>
                                <td>{{$item->y}}</td>
                                </tr>
                                <?php $i++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p>data not found :( </p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col col col-lg-2 text-center">
            <div class="card border-primary bg-dark mb-3 "
                style="min-width: 20rem; color : white; box-shadow: 10px 10px 5px grey; border: 2px solid grey; border-radius: 10px;">
                <div class="card-header"><b>jumlah data</b></div>
                <div class="card-body">
                    <h5 class="card-title">{{count($moments)}}</h5>
                    <a href="/Data/create" class="btn btn-outline-primary" name='new'>new entry</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection