@extends('template.layout')


@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">statitika</h1>
        <p class="lead">data</p>
        <ul class="list-unstyled">
          <li>xxxx</li>
          <li>xxxx</li>
        </ul>
      </div>
    </div>
    <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">no.</th>
                    <th scope="col">nama</th>
                    <th scope="col">nilai 1</th>
                    <th scope="col">nilai 2</th>
                    <th scope="col">nilai 3</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <th scope="row">{{$item -> id }}</th>
                    <td>{{$item -> nama }}</td>
                    <td>{{$item -> nilai_1 }}</td>
                    <td>{{$item -> nilai_2 }}</td>
                    <td>{{$item -> nilai_3 }}</td>
                    <td>
                        <a href="/Data/{{$item -> id}}/edit" class="btn btn-primary" name='edit'>edit</a>
                        
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
  </div>
@endsection

