@extends('cms.parent')

@section('title','Edit products')
@section('subtitle','Edit products')
@section('foldering','Edit products')



@section('style')

@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">New product</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
<form>
    <div class="card-body">
            <div class="form-group">
                <label for="name">product Name</label>
                <input type="text" class="form-control" id="name" name="name"
                value="{{ $products->name }}"aceholder="Enter product Name">
            </div>

            <div class="form-group">
                <label for="sku">sku</label>
                <input type="text" class="form-control" id="sku" name="sku"
                value="{{ $products->sku }}" placeholder="Enter sku">
            </div>
    </div>
    <div class="card-body">
            <div class="form-group">
                <label for="description">product description</label>
                <input type="text" class="form-control" id="description" name="description"
                value="{{ $products->description }}" placeholder="Enter description">
            </div>

            <div class="form-group">
                <label for="price">selling price</label>
                <input type="float" class="form-control" id="price" name="price"
                value="{{ $products->price }}" placeholder="Enter selling price">
            </div>
    </div>
    <div class="card-body">
            <div class="form-group">
                <label for="cost_price">cost price</label>
                <input type="float" class="form-control" id="cost_price" name="cost_price"
                value="{{ $products->cost_price }}" placeholder="Enter cost price">
            </div>

            <div class="form-group">
                <label for="discount_price">discount price</label>
                <input type="float" class="form-control" id="discount_price" name="discount_price"
                value="{{ $products->discount_price }}" placeholder="Enter discount_price">
            </div>

            {{-- <div class="form-group">
                <label for="category_id">category_id </label>
                <select type="float" class="form-control" id="category_id" name="category_id"
                placeholder="Enter discount_price">
                    <option selected>{{ $categories->name }}</option
                </select>


            </div> --}}

    </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="button" onclick="performUpdate({{$products->id}})" class="btn btn-success">Edit</button>
        <a href="{{ route("products.index") }}" type="submit" class="btn btn-secondary">Back to main</a>

      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>
    function performUpdate(id) {
        let formData = new FormData();

        formData.append('name',document.getElementById('name').value);
        formData.append('sku',document.getElementById('sku').value);
        formData.append('description',document.getElementById('description').value);
        formData.append('price',document.getElementById('price').value);
        formData.append('cost_price',document.getElementById('cost_price').value);
        formData.append('discount_price',document.getElementById('discount_price').value);


        storeRoute('/cms/admin/products_update/'+id,formData);
    }

</script>

@endsection
