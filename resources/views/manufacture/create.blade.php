@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Add a Manufacture</h1>
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <form action="{{ route('manufactures.store') }}" method="POST">
      <div class="card">
        <div class="card-header p-2">
          <h3 class="card-title">Infomation</h3>
        </div>
        <div class="card-body">
          @csrf
          <div class="row">
              <x-adminlte-input name="name" label="Manufacture Name" fgroup-class="col-md-12" />
              <x-adminlte-input name="sales_name" label="Sales Name" fgroup-class="col-md-6" />
              <x-adminlte-input name="techsupport_name" label="Tech Name" fgroup-class="col-md-6" />
              <x-adminlte-input name="sales_phone" label="Sales Phone" fgroup-class="col-md-6" />
              <x-adminlte-input name="techsupport_phone" label="Tech Phone" fgroup-class="col-md-6" />
              <x-adminlte-input name="sales_email" label="Sale Email" fgroup-class="col-md-6" />
              <x-adminlte-input name="techsupport_email" label="Tech Email" fgroup-class="col-md-6" />
          </div>
        </div>
        <div class="card-footer">
          <button type="Submit" class="btn btn-primary">Submit</button>
          <a href="{{ route('manufactures.index') }}" class="btn btn-danger float-right">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>

    </script>
@stop
