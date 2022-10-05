@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('manufactures.create') }}" class="btn btn-success float-right">+ Add</a>
    <h1>Manufacturs</h1>
@stop

@section('content')
<div class="row">
  @foreach($manufactures AS $item)
    <div class="col-md-3 col-sm-6 col-12">
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $item->equipment->count() }}</h3>
          <p>{{ $item->name }} device</p>
          </div>
          <div class="icon">
          <i class="fas fa-desktop"></i>
        </div>
        <a href="{{ route('manufactures.show',['manufacture'=>$item]) }}" class="small-box-footer">
          More info <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
  @endforeach
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>

    </script>
@stop
