@extends('template.layout')

@extends('template.layout')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">statistika</h1>
            <p class="lead">import from excel</p>
        </div>
    </div>
    <div class="card ">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="img/img4.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Data Skor</h5>
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal1"> <i class="fas fa-file-import"></i> import</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card ">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="img/img4.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Data Product Moment</h5>
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2"> <i class="fas fa-file-import"></i> import</a>
                </div>
            </div>
        </div>
    </div>


    <div class="card ">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="img/img4.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Data Product Biserial</h5>
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal3"> <i class="fas fa-file-import"></i> import</a>
                </div>
            </div>
        </div>
    </div>

</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Skor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/importdata" method="POST" enctype="multipart/form-data">
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
            <form action="#" method="POST" enctype="multipart/form-data">
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

<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Product Biserial</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="POST" enctype="multipart/form-data">
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
@endsection
