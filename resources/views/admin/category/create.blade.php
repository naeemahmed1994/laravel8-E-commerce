@extends('admin.master')
@section('body')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Category</li>
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
          <h3 class="card-title">Category Entry</h3>

          <div class="card-tools">
            <a type="button" href="{{url('/categories')}}" class="btn btn-primary btn-xs">
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
            <form action="{{url('/create-categories')}}" method="post" enctype="multipart/form-data">
            @csrf
                  <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" placeholder="Enter Category Name">
                    @error('category_name')<p class="text-danger">{{ $message }}</p>@enderror
                  </div>
                  <div class="form-group">
                    <label>Category Description</label>
                    <textarea class="form-control @error('category_description') is-invalid @enderror" name="category_description" placeholder="Enter Category Description"></textarea>
                    @error('category_description')<p class="text-danger">{{ $message }}</p>@enderror
                  </div>

                  <div class="form-group">
                  <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="">Select Status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>

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
