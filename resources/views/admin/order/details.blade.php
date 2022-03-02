@extends('admin.master')
@section('body')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <div class="card">
                <div class="card-header">
                    <h5>Order Information</h5>
                </div>
                <div class="card-body">
                   <p><b>Order No:</b> {{$order->order_no}}</p>
                   <p><b>Order Date:</b> {{$order->created_at}}</p>
                   <p><b>Grand Total:</b>Tk. {{$order->grand_total}}</p>
                </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card">
                <div class="card-header">
                    <h5>Customer Information</h5>
                </div>
                <div class="card-body">
                    <p><b>Customer Name:</b> {{$order->customer->first_name.''.$order->customer->last_name}}</p>
                    <p><b>Customer Name:</b> {{$order->customer->mobile_no}}</p>
                    <p><b>Customer UserName:</b> {{$order->customer->user_name}}</p>
                    <p><b>Customer Email:</b> {{$order->customer->email_address}}</p>
                    <p><b>Customer Address:</b> {{$order->customer->address}}</p>
                    <p><b>Customer Phone:</b> {{$order->customer->mobile_no}}</p>
                </div>
            </div>
            </div>
            @if ($order->shipping)

            <div class="col-sm-3">
            <div class="card">
                <div class="card-header">
                    <h5>Shipping Information</h5>
                </div>
                <div class="card-body">
                    <p><b>Person Name:</b> {{$order->shipping->shipping_first_name.''.$order->shipping->shipping_last_name}}</p>
                    <p><b>Person Address:</b> {{$order->shipping->shipping_address_1}}</p>
                    <p><b>Person City:</b> {{$order->shipping->shipping_city}}</p>
                    <p><b>Person Phone:</b> {{$order->shipping->billing_phone}}</p>
                    <p><b>Person Comment:</b> {{$order->shipping->order_comments}}</p>
                </div>
            </div>
            </div>
            @endif
            @if ($order->billing)
            <div class="col-sm-3">
            <div class="card">
                <div class="card-header">
                    <h5>Billing Information</h5>
                </div>
                <div class="card-body">
                    <p><b>Person Name:</b> {{$order->billing->billing_first_name.''.$order->billing->billing_last_name}}</p>
                    <p><b>Person Address:</b> {{$order->billing->billing_address_1}}</p>
                    <p><b>Person City:</b> {{$order->billing->billing_city}}</p>
                    <p><b>Person Phone:</b> {{$order->billing->billing_phone}}</p>
                </div>
            </div>
          </div>
          @endif
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
          <h3 class="card-title">Product List</h3>

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
                    <th>Product Name</th>
                    <th>Product Brand</th>
                    <th>Product Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($i=1)
                    @foreach ($orderDetails as $order)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$order->product->product_name}}</td>
                        <td>{{$order->product->brand->brand_name}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->total}}</td>
                        <td>{{$order->status==1?'pending':'completed'}}</td>
                        <td>
                            <a href="{{url('/order-details/'.$order->id)}}" class="btn btn-sm btn-primary">view</a>
                        </td>
                    </tr>
                    @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>SI.</th>
                    <th>Product Name</th>
                    <th>Product Brand</th>
                    <th>Product Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Status</th>
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
