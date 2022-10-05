@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Add a New User</h1>
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <form action="{{ route('users.store') }}" method="POST">
      <div class="card">
        <div class="card-header p-2">
          <h3 class="card-title">User Information</h3>
        </div>
        <div class="card-body">
          @csrf
          <div class="row">
              <x-adminlte-input name="name" label="User Name" fgroup-class="col-md-12" />
              <x-adminlte-input name="email" label="Email" fgroup-class="col-md-12" />
          </div>
        </div>
        <div class="card-footer">
          <button type="Submit" class="btn btn-primary float-right">Submit</button>
          <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
@stop


@section('js')
    <script>

    </script>
@stop
