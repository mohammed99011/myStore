@extends('cms.parent')

@section('title','Create product')
@section('main_title','Create product')
@section('sub_title','Create product')



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
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter product Name">
            </div>

            <div class="form-group">
                <label for="sku">sku</label>
                <input type="text" class="form-control" id="sku" name="sku" placeholder="Enter sku">
            </div>
    </div>
    <div class="card-body">
            <div class="form-group">
                <label for="description">product description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Enter description">
            </div>

            <div class="form-group">
                <label for="price">selling price</label>
                <input type="float" class="form-control" id="price" name="price" placeholder="Enter selling price">
            </div>
    </div>
    <div class="card-body">
            <div class="form-group">
                <label for="cost_price">cost price</label>
                <input type="float" class="form-control" id="cost_price" name="cost_price" placeholder="Enter cost price">
            </div>

            <div class="form-group">
                <label for="discount_price">discount price</label>
                <input type="float" class="form-control" id="discount_price" name="discount_price" placeholder="Enter discount_price">
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id" placeholder="Enter discount_price">
                @foreach ($categories as $category)

                    <option value="{{ $category->id }}">{{ $category->name }}</option>

                @endforeach
                </select>
            </div>

    </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="button" onclick="performStore()" class="btn btn-success">Create</button>
        <a href="{{ route("products.index") }}" type="submit" class="btn btn-secondary">Back to main</a>

      </div>
</form>
</div>

@endsection

@section('scripts')

<script>
    function performStore(){
        let formData = new FormData();

        formData.append('name',document.getElementById('name').value);
        formData.append('sku',document.getElementById('sku').value);
        formData.append('description',document.getElementById('description').value);
        formData.append('price',document.getElementById('price').value);
        formData.append('cost_price',document.getElementById('cost_price').value);
        formData.append('discount_price',document.getElementById('discount_price').value);
        formData.append('category_id',document.getElementById('category_id').value);


        store('/cms/admin/products',formData);
    }
</script>

@endsection
