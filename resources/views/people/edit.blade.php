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
          {!! Form::model($people, ['route' => ['people.update', $people->id, 'method' => 'PUT']]) !!}
            <div class="panel panel-default">
                <div class="panel-heading">
                  <label>Edit profile of:</label> {{ $people->name }} {{ $people->surname }}
                  <div class="pull-right">
                    <a href="/people/{{ $people->id }}" type="submit" class="btn btn-primary">Cancel</a>
                    <a href="{{ route('people.destroy', $people->id )}}" type="submit" class="btn btn-danger">Delete</a>
                    {{ Form::submit('Save Changes', ['class' => 'btn btn-success']) }}

                    {!! Form::open(['route' => ['people.destroy', $people->id], 'method' => 'DELETE']) !!}
                      {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                  </div>
                </div>
                <div class="panel-body">
                  <div class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="id_no" class="col-md-4">Name</label>

                        <div class="col-md-6">
                            <div id="id_no" class="">
                              {{ Form::text('name', null, ["class" => 'form-control']) }}
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="id_no" class="col-md-4">Surname</label>

                          <div class="col-md-6">
                              <div id="id_no" class="">
                                {{ Form::text('surname', null, ["class" => 'form-control']) }}
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="id_no" class="col-md-4">ID Number</label>

                          <div class="col-md-6">
                              <div id="id_no" class="">
                                {{ Form::text('id_no', null, ["class" => 'form-control']) }}
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="mobile" class="col-md-4">Mobile Number</label>

                          <div class="col-md-6">
                              <div id="id_no" class="">
                                {{ Form::text('mobile', null, ["class" => 'form-control']) }}
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="birth_date" class="col-md-4">Birth Date</label>

                          <div class="col-md-6">
                              <div id="birth_date" class="">
                                {{ Form::date('birth_date', null, ["class" => 'form-control']) }}
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="language" class="col-md-4">Language</label>

                          <div class="col-md-6">
                              <div id="language" class="">
                                {{ Form::select('language', ['English', 'Tsonga', 'French', 'Other']) }}
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="interest" class="col-md-4">Interest</label>

                          <div class="col-md-6">
                              <div id="interest" class="">
                                {{ Form::text('interest', 'Soccer') }}
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="panel-footer">
                      Member since {{ date('M j, Y H:i', strtotime($people->created_at)) }}<br />
                      Last update / edited {{ date('M j, Y H:i', strtotime($people->updated_at)) }}
                    </div>
                </div>
            </div>
          {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
