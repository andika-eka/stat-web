@extends('template.layout')


@section('content')
<div class="container">
<div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">statistika</h1>
            <p class="lead">export to excel</p>
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
                    <a href="/exportdata" class="btn btn-success">  <i class="fas fa-file-export"></i> export</a>
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
                    <a href="#" class="btn btn-success"> <i class="fas fa-file-export"></i> export</a>
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
                    <a href="#" class="btn btn-success"><i class="fas fa-file-export"></i> export</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
