@extends('cms.parent')

@section('title','colors')
@section('subtitle','colors')
@section('foldering','colors')



@section('style')

@endsection

@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">colors List</h3> <br><br>
                      <a href="{{ route('colors.create') }}" class="btn btn-success" >Create new colors</a>

                      <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                          <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                      <table class="table table-head-fixed text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>color Name</th>
                            <th>product_id</th>
                            <th>Settings</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($colors as $color)


                          <tr>
                            <td>{{$color->id}}</td>
                            <td>{{$color->title}}</td>
                            <td>{{$color->Product_id}}</td>
                            <td>
                                <div class="btn-group">

                                    <a href="{{route('colors.edit', $color->id) }}"type="button" class="btn btn-primary">edit</a>
                                    <button type="button" onclick="performDestroy({{ $color->id }},this)" class="btn btn-danger">delete</button>
                                  </div>

                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>

                    </div>
                    <!-- /.card-body -->
                  </div>
                  {{ $colors->links() }}

                  <!-- /.card -->
                </div>
              </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>

@endsection

@section('scripts')

<script>
    function performDestroy(id,referance){
        let url ='/cms/admin/colors/'+id;
        confirmDestroy(url,referance)
    }
</script>

@endsection
