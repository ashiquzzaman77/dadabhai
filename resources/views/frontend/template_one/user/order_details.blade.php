@extends('frontend.template_one.frontend_dashboard_template_one')
@section('index_template_one')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <div class="container mt-5 mb-5">
        <div class="row">

            {{-- Billing Address  --}}
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-header">
                        <h5>Billing Address</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>

                                <tr>
                                    <th class="fw-bold">Billing Name</th>
                                    <td>{{ $order->billing_name }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Billing Phone</th>
                                    <td>{{ $order->billing_phone }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Billing Email</th>
                                    <td>{{ $order->billing_email }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Billing Address One</th>
                                    <td>{{ $order->billing_address_line1 }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Billing Address Two</th>
                                    <td>{{ $order->billing_address_line2 }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Billing Post Code</th>
                                    <td>{{ $order->billing_postal_code }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Billing City</th>
                                    <td>{{ $order->billing_city }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Billing State</th>
                                    <td>{{ $order->billing_state }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Billing Country</th>
                                    <td>{{ $order->billing_country }}</td>
                                </tr>

                            </thead>
                        </table>
                    </div>
                </div>

            </div>
            {{-- Billing Address  --}}

            {{-- Order Info  --}}
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-header">
                        <h5>Shipping Info</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>

                                <tr>
                                    <th class="fw-bold">Invoice No</th>
                                    <td class="text-danger">{{ $order->invoice_number }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Order Number</th>
                                    <td>{{ $order->order_number }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Payment Method</th>
                                    <td>{{ $order->payment_method }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Transcation Number</th>
                                    <td>{{ $order->transaction_number }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Total Amount</th>
                                    <td>Tk {{ $order->total_amount }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Payment Status</th>
                                    <td>{{ $order->payment_status }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Order Date</th>
                                    <td>{{ $order->order_date }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Status</th>
                                    <td class="badge badge-danger">{{ $order->status }}</td>
                                </tr>

                                {{-- <tr>
                                    <th>
                                        <form action="">
                                            @csrf
                                            <select name="" class="mx-3">
                                                <option selected disabled>Change Status</option>
                                                <option value="pending">Pending</option>
                                                <option value="processing">Processing</option>
                                                <option value="shipped">Shipped</option>
                                                <option value="delivered">Delivered</option>
                                            </select>

                                            <button class="btn btn-primary">Submit</button>
                                        </form>
                                    </th>
                                </tr> --}}

                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            {{-- Order Info  --}}


            {{-- Product Details --}}
            <div class="col-lg-12 mt-4">

                <table class="table table-striped  table-bordered">
                    <thead class="grenadier-bg text-white">
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">Image</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($orderitem as $key => $item)
                            <tr>
                                <th>{{ $key + 1 }}</th>

                                <td>
                                    <img src="{{ asset($item->product->product_image) }}" alt=""
                                        style="width: 40px;">
                                </td>

                                <td>{{ $item->product->product_name }}</td>
                                <td>Tk {{ $item->price }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>Tk {{ $item->qty * $item->price }}</td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
            {{-- Product Details --}}

        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $("#select").select2({
            tags: true,
            // dropdownParent: $('#modal), // if select in modal
            theme: "bootstrap",
        });
    </script>
@endpush
