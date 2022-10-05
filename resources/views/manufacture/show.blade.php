@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('equipment.create') }}" class="btn btn-success float-right"> + Add</a>
    <h1>{{ $manufacture->name }}</h1>
@stop

@section('content')
<div class="row">
  <div class="col-md-3">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Contact Info</h3>
      </div>
      <div class="card-body">
        <strong><i class="fas fa-book mr-1"></i> Sales</strong>
        <p class="text-muted">
          {{ $manufacture->sales_name }}<br>
          {{ $manufacture->sales_phone }}<br>
          {{ $manufacture->sales_email }}
        </p>
        <hr>
        <strong><i class="far fa-file-alt mr-1"></i> Tech Support</strong>
        <p class="text-muted">
          {{ $manufacture->techsupport_name }}<br>
          {{ $manufacture->techsupport_phone }}<br>
          {{ $manufacture->techsupport_email }}
        </p>
      </div>
      <div class="card-footer">
        <a class="btn btn-success btn-block" href="{{ route('manufactures.edit',['manufacture'=>$manufacture]) }}">Edit</a>
      </div>
    </div>
  </div>

  <div class="col-md-9">
    <div class="card">
      <div class="card-header p-2">
        <h3 class="card-title">Equipment</h3>
      </div>
      <div class="card-body">
        <table id="equipment_table" class="table" style="width:100%">
            <thead>
                <tr>
                    <th>Model</th>
                    <th>Category</th>
                    <th>CPU</th>
                    <th>Memory</th>
                    <th>Storage</th>
                    <th>Invoice#</th>
                    <th>Price</th>
                    <th>Purchase Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($manufacture->equipment AS $item)
                <tr>
                    <td>{{ $item->model }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->CPU }}</td>
                    <td>{{ $item->memory }}</td>
                    <td>{{ $item->storage }}</td>
                    <td>{{ $item->invoice_number }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->purchase_date }}</td>
                    <td>
                      <a class="btn btn-primary btn-xs" href="{{ route('equipment.show',['equipment'=>$item]) }}">View</a>
                      <form action="{{ route('equipment.destroy',['equipment'=>$item]) }}" method="POST" >
                        @csrf
                        <input type="hidden" name="_method" value="DELETE" />
                        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                      </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
    $(document).ready(function() {
      $('#equipment_table').DataTable();
    });
    </script>
@stop
