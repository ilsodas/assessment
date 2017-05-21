@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      @if (Session::has('Success'))
        <div class="alert alert-success" role="alert">
          {{ Session::get('success')}}
        </div>
      @endif
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h1>All people</h1>
                </div>
                <div class="panel-body">
                  <div class="clear">
                    <div class="pull-left">Here is a list of people on our database</div>
                    <div class="pull-right">
                      <a href="{{ route('people.create')}}" type="submit" class="btn btn-lg btn-primary">Create</a>
                    </div>
                  </div>


                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <table class="table">
                    <thead>
                      <th>#</th>
                      <th>Name</th>
                      <th>Surname</th>
                      <th>Mobile Number</th>
                      <th>Birth Date</th>
                      <th>Language</th>
                      <th>Action</th>
                    </thead>
                    <tbody>

                      @foreach ($peoples as $people)

                        <tr>
                          <th>{{ $people->id }}</th>
                          <td>{{ $people->name }}</td>
                          <td>{{ $people->surname }}</td>
                          <td>{{ $people->mobile }}</td>
                          <td>{{ $people->birth_date }}</td>
                          <td>{{ $people->language }}</td>
                          <td>
                            <a href="/people/{{ $people->id }}" type="submit" class="btn btn-primary">View</a>
                            <a href="/people/{{ $people->id }}/edit" type="submit" class="btn btn-primary">Edit</a>
                            <a href="{{ route('people.destroy', $people->id )}}" type="submit" class="btn btn-danger">Delete</a>
                         </td>
                        </tr>

                      @endforeach

                    </tbody>
                  </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
