@extends('admin.master')
@section('body')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Slider</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Slider</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @if(Session::get('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{Session::get('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Slider Entry</h3>

          <div class="card-tools">
            <a type="button" href="{{url('/slider')}}" class="btn btn-primary btn-xs">
              <i class="fas fa-plus"></i> List
            </a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            <form action="{{url('/edit-slider/'.$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
                  <div class="form-group">
                    <label>Slider Heading 1</label>
                    <input type="text" class="form-control" name="first_heading_text" placeholder="Enter Slider Heading 1" value="{{$data->first_heading_text}}">
                  </div>
                  <div class="form-group">
                    <label>Slider Heading 2</label>
                    <input type="text" class="form-control" name="second_heading_text" placeholder="Enter Slider Heading 2" value="{{$data->second_heading_text}}">
                  </div>
                  <div class="form-group">
                    <label>Slider Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image_path">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>

                    </div>
                  </div>
                  <img src="{{asset($data->image_path)}}" alt="">
                  <div class="form-group">
                  <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="">Select Status</option>
                        <option value="1" {{$data->status== 1 ? 'selected' : ''}}>Active</option>
                        <option value="0" {{$data->status== 0 ? 'selected' : ''}}>Inactive</option>

                    </select>
                  </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>


        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

@endsection
