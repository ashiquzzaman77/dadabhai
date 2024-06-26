@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Order</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Total Order<span
                            class="ms-2 badge bg-danger">{{ count($orders) }}</span></li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">

                <!--begin::Primary button-->
                {{-- <a href="{{ route('add.product') }}" class="btn btn-light-primary btn-sm">Add
                    Product</a> --}}
                <!--end::Primary button-->

            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Post-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-body pt-0">
                        <!--begin::Table-->

                        <table id="kt_datatable_example_5" class="table table-striped" style="width:100%">
                            <thead>
                                <tr class="bg-info text-light">
                                    <th style="width:30px;">Sl</th>
                                    {{-- <th>Image</th> --}}
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Order Number</th>
                                    <th>Invoice</th>
                                    <th>Order Date</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($orders as $key => $order)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        {{-- <td>
                                            <img src="{{ asset($product->product_image) }}" style="width: 40px;"
                                                alt="">
                                        </td> --}}
                                        <td>{{ $order->billing_name }}</td>
                                        <td>{{ $order->billing_phone }}</td>
                                        <td>{{ $order->order_number }}</td>
                                        <td>{{ $order->invoice_number }}</td>
                                        <td>{{ $order->order_date }}</td>
                                        <td>{{ $order->payment_method }}</td>
                                        <td class="text-danger">{{ $order->status }}</td>
                                        <td>


                                            <a href="{{ route('admin.order.details', $order->id) }}" class="ms-1"
                                                title="Edit"><i class="bi bi-eye fs-3 text-primary"></i></a>

                                            <a href="" class="ms-1" id="delete" title="Delete"><i
                                                    class="bi bi-trash3-fill fs-3 text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>

                        <!--end::Table-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Post-->

    <!-- Button trigger modal -->
    <script>
        $("#kt_datatable_example_5").DataTable({
            "language": {
                "lengthMenu": "Show _MENU_",
            },
            "dom": "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"
        });
    </script>
@endsection
