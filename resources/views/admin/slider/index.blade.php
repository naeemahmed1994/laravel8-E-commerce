@extends('admin.master')
@section('body')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Slider</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Slider</li>
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
          <h3 class="card-title">Slider List</h3>

          <div class="card-tools">
            <a type="button" href="{{url('/create-slider')}}" class="btn btn-primary btn-xs">
              <i class="fas fa-plus"></i> Create
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
        <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SI.</th>
                    <th>Image</th>
                    <th>First Text</th>
                    <th>Second Text</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($i=1)
                    @foreach($sliders as $slider)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>
                        <img src="{{$slider->image_path}}" width="200">
                    </td>
                    <td>{{$slider->first_heading_text}}</td>
                    <td>{{$slider->second_heading_text}}</td>
                    <td>{{$slider->status ==1? 'Active': 'Inactive'}}</td>
                    <td>{{date('d-m-Y', strtotime($slider->created_at))}}</td>
                    <td>
                        <a href="{{url('edit-slider/'.$slider->id)}}" class="btn btn-xs btn-info">Edit</a>
                        <a href="{{url('delete-slider/'.$slider->id)}}" class="btn btn-xs btn-danger">Delate</a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>SI.</th>
                    <th>Image</th>
                    <th>First Text</th>
                    <th>Second Text</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>

        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

@endsection
