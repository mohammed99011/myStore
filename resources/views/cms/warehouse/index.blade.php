@extends('cms.parent')

@section('title','Warehouses')
@section('subtitle','Warehouses')
@section('foldering','Warehouses')



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
                      <h3 class="card-title">Warehouses List</h3> <br><br>
                      <a href="{{ route('warehouses.create') }}" class="btn btn-success" >Create new Warehouse</a>

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
                            <th>name</th>
                            <th>warehouse Number</th>
                            {{-- <th>adress</th> --}}
                            <th>Settings</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($warehouses as $warehouse)


                          <tr>
                            <td>{{$warehouse->id}}</td>
                            <td>{{$warehouse->name}}</td>
                            <td>{{$warehouse->warehouse_No}}</td>
                            {{-- <td>{{$warehouse->adress}}</td> --}}
                            <td>
                                <div class="btn-group">

                                    <a href="{{route('warehouses.edit', $warehouse->id)    }}"type="button" class="btn btn-primary">edit</a>
                                    <button type="button" onclick="performDestroy({{ $warehouse->id }},this)" class="btn btn-danger">delete</button>
                                  </div>

                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>

                    </div>
                    <!-- /.card-body -->
                  </div>
                  {{ $warehouses->links() }}

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
        let url ='/cms/admin/warehouses/'+id;
        confirmDestroy(url,referance)
    }
</script>

@endsection
