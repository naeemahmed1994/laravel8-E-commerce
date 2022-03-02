@extends('admin.master')
@section('body')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
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
          <h3 class="card-title">Order List</h3>

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
        <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SI.</th>
                    <th>Order No.</th>
                    <th>Customer Phone</th>
                    <th>Grand Total</th>
                    <th>Quantity</th>
                    <th>Payment Method</th>
                    <th>Delivery Type</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($i=1)
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$order->order_no}}</td>
                        <td>{{$order->customer->mobile_no}}</td>
                        <td>{{$order->grand_total}}</td>
                        <td>{{count($order->orderDetails)}}</td>
                        <td>{{$order->payment_method}}</td>
                        <td>{{$order->delivery_type}}</td>
                        <td>{{$order->status==1?'pending':'completed'}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>
                            <a href="{{url('/order-details/'.$order->id)}}" class="btn btn-sm btn-primary">View</a>
                            @if ($order->status==1)
                            <a href="{{url('/order-status/'.$order->id)}}" class="btn btn-sm btn-warning">Complete Order</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>SI.</th>
                    <th>Order No.</th>
                    <th>Customer Phone</th>
                    <th>Grand Total</th>
                    <th>Quantity</th>
                    <th>Payment Method</th>
                    <th>Delivery Type</th>
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
