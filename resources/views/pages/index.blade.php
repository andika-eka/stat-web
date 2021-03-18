@extends('template.layout')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">statitika</h1>
            <p class="lead">home</p>
            <div class="col-lg d-flex justify-content-center text-center">
                <div class="card  " style="min-width: 30rem;">
                    <div class="card-header"><b>jumlah data</b></div>
                    <div class="card-body">
                        <h5 class="card-title">{{$data}}</h5>
                        <a href="/Data/create" class="btn btn-primary" name='new'>new entry</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12 ">
            <ul class="list-unstyled">
                <li> <a class="btn btn-outline-primary btn-lg btn-block" href="/Data">data</a></li>
                
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 ">
            <ul class="list-unstyled">
                
                <li> <a class="btn btn-outline-primary btn-lg btn-block" href="/info">info</a></li>
     
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 ">
            <ul class="list-unstyled">
                
                <li> <a class="btn btn-outline-primary btn-lg btn-block" href="/about">about</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection
