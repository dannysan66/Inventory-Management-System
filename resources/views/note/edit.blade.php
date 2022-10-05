@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ $equipment->manufacture->name }} - {{ $equipment->model }}</h1>
@stop

@section('content')
<div class="row">
  <div class="col-md-3">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Details</h3>
      </div>
      <div class="card-body">
        <strong><i class="fas fa-book mr-1"></i> Hardware Specification</strong>
        <p class="text-muted">
          CPU: {{ $equipment->CPU }}<br>
          RAM: {{ $equipment->memory }}<br>
          Storage{{ $equipment->storage }}
        </p>
        <hr>
        <strong><i class="far fa-file-alt mr-1"></i> Purchase Info</strong>
        <p class="text-muted">
          Invoice#: {{ $equipment->invoice_number }}<br>
          Price: $ {{ $equipment->price }}<br>
          Purchase Date: {{ $equipment->purchase_date }}
        </p>
      </div>
      <div class="card-footer">
        <a class="btn btn-success btn-block" href="{{ route('equipment.edit',['equipment'=>$equipment]) }}">Edit</a>
      </div>
    </div>
  </div>

  <div class="col-md-9">
    <div class="card card-warning">
      <form action="{{ route('notes.update',['note'=>$note->id]) }}" method="POST">
        <div class="card-header">
          <h3 class="card-title">Edit a note</h3>
        </div>
        <div class="card-body">
          @csrf          
          <input type="hidden" name="_method" value="PUT" />
          <x-adminlte-input name="subject" type="text" placeholder="subject" value="{{ old('subject')?old('subject'):$note->subject }}" />
          <x-adminlte-textarea name="content" placeholder="Content ...">{{ old('content')?old('content'):$note->content }}</x-adminlte-textarea>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </form>
    </div>

  </div>

</div>
@stop

@section('css')

@stop

@section('js')
    <script>
    $(document).ready(function() {
      $('.table').DataTable({
        "paging":   false,
        "info":     false,
        "searching": false
      });
    });
    </script>
@stop
