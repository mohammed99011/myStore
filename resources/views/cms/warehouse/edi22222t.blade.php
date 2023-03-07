@extends('cms.parent')

@section('title','Edit warehouses')
@section('subtitle','Edit warehouses')
@section('foldering','Edit warehouses')



@section('style')

@endsection

@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Warehouse</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="name">Warehouse Name</label>
          <input type="text" class="form-control" id="name" value="{{ $warehouses->name }}" name="name" placeholder="Enter Warehouse Name">
        </div>

        <div class="form-group">
          <label for="warehouse_No">Warehouse Number</label>
          <input type="number" class="form-control" id="warehouse_No" value="{{ $warehouses->warehouse_No }}" name="warehouse_No" placeholder="Enter Warehouse uniqe Number">
        </div>

        <div class="form-group">
            <label for="adress">Adress</label>
            <select type="text" class="form-control" id="adress" value="{{ $warehouses->adress }}" name="adress" placeholder="Enter Warehouse adress">
          </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="button" onclick="performUpdate({{ $warehouses->id}})" class="btn btn-success">Edit</button>
        <a href="{{ route("warehouses.index") }}" type="submit" class="btn btn-secondary">Back to main</a>

      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>
    function performUpdate(id) {
        let formData = new FormData();

        formData.append('name',document.getElementById('name').value);
        formData.append('warehouse_No',document.getElementById('warehouse_No').value);
        formData.append('adress',document.getElementById('adress').value);


        storeRoute('/cms/admin/warehouses_update/'+id,formData);
    }

</script>

@endsection
