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
                    <a href="#" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal2"> <i class="fas fa-file-import"></i> import</a>
                    <a href="/exportMoment" class="btn btn-outline-success" ><i class="fas fa-file-export"></i>Export</a>
                    <a href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModaldel"> <i class="fas fa-trash-alt"></i>Clear</a>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Product Moment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/importMoment" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="file" name="file" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                        <button type="submit" class="btn btn-success">  <i class="fas fa-file-import"></i>Import</button>
                        @csrf
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModaldel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus semua data pada table ini ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="delete" action="/moment" method="POST">
            <h1 style=" text-align: center; color:red"><i class="fas fa-exclamation-triangle fa-4x"></i></h1>
            <div class="modal-footer">
                @csrf 
                @method('DELETE')
                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                <button type="submit" class="btn btn-danger" name='delete'>Clear</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection