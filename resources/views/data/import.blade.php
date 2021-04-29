<?php use App\Http\Controllers\DataController;
?>
@extends('template.layout')


@section('content')
<div class="container" >
    <div class="row">

        <div class="col-6" style=" box-shadow: 10px 10px 5px grey; border: 2px solid grey; border-radius: 10px; margin: auto; padding: 10px;">
            <h1>data entry</h1>
            <hr>
            <form class=" form-horizontal" method='POST' action="/import" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label class="control-label col-sm-3" for='nilai_1'>nilai:</label>
                    <div class="col">
                        <input type="file" class="form-control" id='file' name="file">
                        <hr>
                        <input type="submit" class="btn btn-primary" style="padding : 50 px;" value="import" >
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
