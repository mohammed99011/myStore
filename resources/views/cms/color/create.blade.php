@extends('cms.parent')

@section('title' , 'Create color')

@section('main-title' , 'Create color')

@section('sub-title' , 'Create color')

@section('styles')

@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create New color</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                <div class="card-body">
                    <div class="form-group">
                      <label for="title">colors</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Enter color Name">
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
                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('colors.index') }}" type="submit" class="btn btn-info">GO BACK</a>

              </div>
            </form>
          </div>
          <!-- /.card -->


        </div>
        <!--/.col (left) -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('scripts')

<script>
function performStore(){

let formData = new FormData();
    formData.append('title',document.getElementById('title').value);
    formData.append('product_id',document.getElementById('product_id').value);
    store('/cms/admin/colors' , formData);
}

</script>

@endsection
