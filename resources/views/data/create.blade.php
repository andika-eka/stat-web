<?php use App\Http\Controllers\DataController;
?>
@extends('template.layout')


@section('content')
<div class="container" >
    <div class="row">

        <div class="col-6" style=" box-shadow: 10px 10px 5px grey; border: 2px solid grey; border-radius: 10px; margin: auto; padding: 10px;">
            <h1>data entry</h1>
            <hr>
            <form class=" form-horizontal" method='POST' action="/Data">
                @csrf
                
                <div class="form-group">
                    <label class="control-label col-sm-3" for='nilai_1'>nilai:</label>
                    <div class="col">
                        <input type="number" class="form-control" id='nilai_1' name="nilai_1" min="0" max="100">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button class="btn btn-primary" name='Create'>Create</button>
                        <a href="/Data" class="btn btn-secondary" name='cancel'>cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
