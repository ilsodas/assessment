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
                  <label>Profile for:</label> {{ $people->name }} {{ $people->surname }}
                  <div class="pull-right">
                    <a href="/people/{{ $people->id }}/edit" type="submit" class="btn btn-primary">Edit</a>
                    {!! Form::open(['route' => ['people.destroy', $people->id], 'method' => 'DELETE']) !!}
                      {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                  </div>
                </div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form">
                      <div class="form-group">
                          <label for="id_no" class="col-md-4">ID Number</label>

                          <div class="col-md-6">
                              <div id="id_no" class="">
                                {{ $people->id_no }}
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="mobile" class="col-md-4">Mobile Number</label>

                          <div class="col-md-6">
                              <div id="id_no" class="">
                                {{ $people->mobile }}
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="birth_date" class="col-md-4">Birth Date</label>

                          <div class="col-md-6">
                              <div id="birth_date" class="">
                                {{ $people->birth_date }}
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="language" class="col-md-4">Language</label>

                          <div class="col-md-6">
                              <div id="language" class="">
                                {{ $people->language }}
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="interest" class="col-md-4">Interest</label>

                          <div class="col-md-6">
                              <div id="interest" class="">
                                {{ $people->interest }}
                              </div>
                          </div>
                      </div>
                    </form>
                    <div class="panel-footer">
                      Member since {{ date('M j, Y H:i', strtotime($people->created_at)) }}<br />
                      Last update / edited {{ date('M j, Y H:i', strtotime($people->updated_at)) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
