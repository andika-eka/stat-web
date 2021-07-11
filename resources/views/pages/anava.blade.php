@extends('template.layout')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">statistika</h1>
            <p class="lead">Uji Anava</p>
        </div>
    </div>
    <div class="row">

        <div class="table-responsive shadow p-3 mb-5 bg-white rounded">
            @if(1 > 0)

            <table class="table table-bordered"  width="100%" cellspacing="0" >
                <thead class="thead-light">
                    <tr>
                        <th>no</th>
                        <th>Rentangan</th>
                        <th>Frekuensi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>no</th>
                        <th>Rentangan</th>
                        <th>Frekuensi</th>
                    </tr>
                </tfoot>

                <tbody>
                    
            </table>
        </div>

        @else
        <p>data not found :( </p>
        @endif
    </div>
</div>

@endsection
