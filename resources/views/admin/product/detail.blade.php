@extends('admin.master')
@section('body')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Project Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects Detail</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-2">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Regular Price</span>
                      <span class="info-box-number text-center text-muted mb-0">Tk. {{$product->regular_price}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Discount Price</span>
                      <span class="info-box-number text-center text-muted mb-0">Tk. {{$product->discount_price}}</span>
                    </div>
                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Product Images</h4>

                  <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image Type</th>
                        <th scope="col">Image</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product->productImage as $image)


                        <tr>
                        <th scope="row">1</th>
                            <td>{{$image->image_type}}</td>
                            <td>
                                <img src="{{asset($image->image)}}">
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                    </table>

                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-1">
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{$product->product_name}}</h3>
              <span class="text-muted">{!!$product->product_description!!}</span>
              <br>
              <div class="text-muted">
                <p class="text-sm">Category
                  <b class="d-block">{{$product->category->category_name}}</b>
                </p>
                <p class="text-sm">Brand
                  <b class="d-block">{{$product->brand->brand_name}}</b>
                </p>
              </div>

              <h5 class="mt-5 text-muted">Project files</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                </li>
              </ul>
              <div class="text-center mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary">Add files</a>
                <a href="#" class="btn btn-sm btn-warning">Report contact</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

@endsection
