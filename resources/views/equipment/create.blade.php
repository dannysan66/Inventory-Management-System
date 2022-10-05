@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Add Equipment</h1>
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <form action="{{ route('equipment.store') }}" method="POST">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Please fill out the form</h3>
        </div>
        <div class="card-body">
          @csrf
          <div class="row">
              <x-adminlte-select name="manufacture_id" label="Manufacture *" fgroup-class="col-md-6" >
                @foreach($manufactures AS $item)
                  <option value="{{ $item->id }}" {{ old('manufacture_id')==$item->id?'selected':'' }}>{{ $item->name }}</option>
                @endforeach
              </x-adminlte-select>
              <x-adminlte-select name="category_id" label="Category *" fgroup-class="col-md-6" >
                @foreach($categories AS $item)
                  <option value="{{ $item->id }}" {{ old('category_id')==$item->id?'selected':'' }}>{{ $item->name }}</option>
                @endforeach
              </x-adminlte-select>
              <x-adminlte-input name="model" label="Model *" fgroup-class="col-md-6" value="{{ old('model') }}" />
              <x-adminlte-input name="CPU" label="CPU" fgroup-class="col-md-6" value="{{ old('CPU') }}" />
              <x-adminlte-input name="memory" label="Memory" fgroup-class="col-md-6" value="{{ old('memory') }}" />
              <x-adminlte-input name="storage" label="Storage" fgroup-class="col-md-6" value="{{ old('storage') }}" />
              <x-adminlte-input name="invoice_number" label="Invoice Number *" fgroup-class="col-md-6" value="{{ old('invoice_number') }}" />
              <x-adminlte-input name="price" label="Price *" fgroup-class="col-md-6" value="{{ old('price') }}" />
              <x-adminlte-input name="purchase_date" label="Purchase Date *" fgroup-class="col-md-6" type="date" value="{{ old('purchase_date') }}" />
              <x-adminlte-select name="user_id" label="Current User" fgroup-class="col-md-6" >
                <option value="">N/A</option>
                @foreach($users AS $item)
                  <option value="{{ $item->id }}" {{ old('user_id')==$item->id?'selected':'' }}>{{ $item->name }}</option>
                @endforeach
              </x-adminlte-select>
          </div>
        </div>
        <div class="card-footer">
          <button type="Submit" class="btn btn-primary float-right">Submit</button>
          <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
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
