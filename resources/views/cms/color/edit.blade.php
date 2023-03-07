@extends('cms.parent')

@section('title','Edit colors')
@section('subtitle','Edit colors')
@section('foldering','Edit colors')



@section('style')

@endsection

@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit colors</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
        <div class="card-body">
            <div class="form-group">
              <label for="title">color Name</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ $colors->title }}" placeholder="Enter color Name">
            </div>

            <div class="form-group">
              <label for="product_id"> product_id</label>
              <select type="text" class="form-control" id="product_id" name="product_id" placeholder="Enter description">
                @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>

                @endforeach
              </select>
            </div>



          </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="button" onclick="performUpdate({{$colors->id}})" class="btn btn-success">Edit</button>
        <a href="{{ route("colors.index") }}" type="submit" class="btn btn-secondary">Back to main</a>

      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>
    function performUpdate(id) {
        let formData = new FormData();

        formData.append('title',document.getElementById('title').value);
        formData.append('product_id',document.getElementById('product_id').value);


        storeRoute('/cms/admin/colors_update/'+id,formData);
    }

</script>

@endsection
