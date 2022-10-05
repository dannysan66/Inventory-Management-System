@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('users.edit',['user'=>$user]) }}" class="btn btn-primary float-right"> Edit</a>
    <h1>{{ $user->name }}</h1>
    <p>{{ $user->email }} </p>
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header p-2">
        <a href="{{ route('equipment.create') }}" class="btn btn-success float-right"> + Add Equipment</a>
        <h3 class="card-title">Equipment</h3>
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
            <tbody>
                @foreach($user->equipment AS $item)
                <tr>
                    <td>{{ $item->manufacture->name }}</td>
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
