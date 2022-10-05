@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ $manufacture->name }}</h1>
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <form action="{{ route('manufactures.update',['manufacture'=>$manufacture]) }}" method="POST">
      <div class="card">
        <div class="card-header p-2">
          <h3 class="card-title">Infomation</h3>
        </div>
        <div class="card-body">
          @csrf
          <input type="hidden" name="_method" value="PUT" />
          <div class="row">
              <x-adminlte-input name="name" label="Manufacture Name" fgroup-class="col-md-12" value="{{ old('name')?:$manufacture->name }}" />
              <x-adminlte-input name="sales_name" label="Sales Name" fgroup-class="col-md-6" value="{{ old('sales_name')?:$manufacture->sales_email }}" />
              <x-adminlte-input name="techsupport_name" label="Tech Name" fgroup-class="col-md-6" value="{{ old('techsupport_name')?:$manufacture->techsupport_name }}" />
              <x-adminlte-input name="sales_phone" label="Sales Phone" fgroup-class="col-md-6" value="{{ old('sales_phone')?:$manufacture->sales_phone }}" />
              <x-adminlte-input name="techsupport_phone" label="Tech Phone" fgroup-class="col-md-6" value="{{ old('techsupport_phone')?:$manufacture->techsupport_phone }}" />
              <x-adminlte-input name="sales_email" label="Sale Email" fgroup-class="col-md-6" value="{{ old('sales_email')?:$manufacture->sales_email }}" />
              <x-adminlte-input name="techsupport_email" label="Tech Email" fgroup-class="col-md-6" value="{{ old('techsupport_email')?:$manufacture->techsupport_email }}" />
          </div>
        </div>
        <div class="card-footer">
          <button type="Submit" class="btn btn-primary float-right">Submit</button>
          <a href="{{ route('manufactures.show',['manufacture'=>$manufacture]) }}" class="btn btn-danger">Cancel</a>
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
