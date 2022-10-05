@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('equipment.create') }}" class="btn btn-success float-right"> + Add</a>
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">All Equipment</h3>
      </div>
      <div class="card-body">
        <table id="equipment_table" class="table" style="width:100%">
            <thead>
                <tr>
                    <th>Manufacture</th>
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
      $('#equipment_table').DataTable({
            "processing": true,
            "ajax": "equipment",
            "columns": [
                { "data": "manufacture.name" },
                { "data": "model" },
                { "data": "category.name" },
                { "data": "CPU" },
                { "data": "memory" },
                { "data": "storage" },
                { "data": "invoice_number" },
                { "data": "price" },
                { "data": "purchase_date" },
                { "data": "id",
                  render: function (data, type, full) {
                    var url = '{{ route("equipment.show","") }}'+"/"+data;
                    return '<a href="'+url+'" class="btn btn-success" >View</a>';
                  }
              },
            ]
      });
    });
    </script>
@stop
