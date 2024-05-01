@extends('frontend.template_one.frontend_dashboard_template_one')
@section('index_template_one')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">


                    @include('frontend.template_one.user.dashboard-sidebar')

                    <!-- /.col-md-4 -->
                    <div class="col-md-10">
                        <div class="tab-content" id="myTabContent">

                            {{-- User Dashboard Content --}}
                            <div class="tab-pane fade show active" id="dashboard" role="tabpanel"
                                aria-labelledby="dashboard-tab">
                                <div>
                                    <div class="heading-2">
                                        <h3 class="title-3 fsz-15 grenadier-color">All Details</h3>
                                    </div>
                                    {{-- Dashboard Cards --}}
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <h5 class="font-weight-bold">(01)</h5>
                                                        <p class="grenadier-color">Total Orders</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <h5 class="font-weight-bold">(01)</h5>
                                                        <p class="grenadier-color">Wishlist</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <h5 class="font-weight-bold">(01)</h5>
                                                        <p class="grenadier-color">Ondemand</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Dashboard Cards End --}}
                                    {{-- Dashboard Links --}}
                                    <div class="heading-2 py-3">
                                        <h3 class="title-3 fsz-15 grenadier-color font-weight-bold">Quick Navigation</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="card">
                                                <div
                                                    class="card-header text-center font-weight-bold text-white grenadier-bg">
                                                    Order details
                                                </div>
                                                <div class="card-body">
                                                    <ul>
                                                        <li class="nav-link py-0"><a href="" class="text-muted">Order
                                                                History</a></li>
                                                        <li class="nav-link py-0"><a href=""
                                                                class="text-muted">Rfqs</a></li>
                                                        <li class="nav-link py-0"><a href="" class="text-muted">Pre
                                                                Book History</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="card">
                                                <div
                                                    class="card-header text-center font-weight-bold text-white grenadier-bg">
                                                    Delivery status
                                                </div>
                                                <div class="card-body">
                                                    <ul>
                                                        <li class="nav-link py-0"><a href="" class="text-muted">Track
                                                                order</a></li>
                                                        <li class="nav-link py-0"><a href=""
                                                                class="text-muted">Return My Order</a></li>
                                                        <li class="nav-link py-0"><a href=""
                                                                class="text-muted">Delivery Details</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="card">
                                                <div
                                                    class="card-header text-center font-weight-bold text-white grenadier-bg">
                                                    Products
                                                </div>
                                                <div class="card-body">
                                                    <ul>
                                                        <li class="nav-link py-0"><a href=""
                                                                class="text-muted">Wistlist</a></li>
                                                        <li class="nav-link py-0"><a href="" class="text-muted">Love
                                                                list</a></li>
                                                        <li class="nav-link py-0"><a href="" class="text-muted">Save
                                                                cart</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="card">
                                                <div
                                                    class="card-header text-center font-weight-bold text-white grenadier-bg">
                                                    Payment method
                                                </div>
                                                <div class="card-body">
                                                    <ul>
                                                        <li class="nav-link py-0"><a href=""
                                                                class="text-muted">Pending Payments</a></li>
                                                        <li class="nav-link py-0"><a href=""
                                                                class="text-muted">Payment Receipts</a></li>
                                                        <li class="nav-link py-0"><a href=""
                                                                class="text-muted">Payment History</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Dashboard Links End --}}
                                </div>
                            </div>
                            {{-- User Dashboard Content End --}}

                            {{-- Order Content --}}
                            @include('frontend.template_one.user.user_order')
                            
                            {{-- Order Content End --}}

                            {{-- delivery Content --}}
                            <div class="tab-pane fade" id="delivery" role="tabpanel" aria-labelledby="delivery-tab">
                                <div>
                                    <div class="heading-2">
                                        <h3 class="title-3 fsz-15 grenadier-color">Delivery Status</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-striped  table-bordered">
                                                <thead class="grenadier-bg text-white">
                                                    <tr>
                                                        <th scope="col" class="text-center">Delivery No</th>
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col" class="text-center">Date</th>
                                                        <th scope="col" class="text-center">Status</th>
                                                        <th scope="col">Paid amount</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" class="text-center">1</th>
                                                        <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quae,
                                                            inventore.</td>
                                                        <td>30 May 2024</td>
                                                        <td class="text-center"><span
                                                                class="badge badge-primary">Deliverd</span></td>
                                                        <td class="text-center">$1150</td>
                                                        <td>
                                                            <a href=""><i
                                                                    class="fa fa fa-pencil text-muted pr-2"></i></a>
                                                            <a href=""><i class="fa fa-trash text-danger"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="text-center">2</th>
                                                        <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quae,
                                                            inventore.</td>
                                                        <td>30 May 2024</td>
                                                        <td class="text-center"><span class="badge badge-danger">Ready To
                                                                Delivery</span></td>
                                                        <td class="text-center">$1150</td>
                                                        <td>
                                                            <a href=""><i
                                                                    class="fa fa fa-pencil text-muted pr-2"></i></a>
                                                            <a href=""><i class="fa fa-trash text-danger"></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{-- Dashboard Links End --}}
                                </div>
                            </div>
                            {{-- End --}}

                            {{-- payment Content --}}
                            <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                                <div>
                                    <div class="heading-2">
                                        <h3 class="title-3 fsz-15 grenadier-color">Pre Booked History</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-striped  table-bordered">
                                                <thead class="grenadier-bg text-white">
                                                    <tr>
                                                        <th scope="col" class="text-center">Order No</th>
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">Payment Id</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col" class="text-center">Date</th>
                                                        <th scope="col" class="text-center">Status</th>
                                                        <th scope="col">Total amount</th>
                                                        <th scope="col">Paid amount</th>
                                                        <th scope="col" class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" class="text-center">1</th>
                                                        <td>Lorem ipsum dolor,</td>
                                                        <td class="text-center">#5564a658</td>
                                                        <td>Booked</td>
                                                        <td>30 May 2024</td>
                                                        <td class="text-center"><span
                                                                class="badge badge-primary">Deliverd</span></td>
                                                        <td class="text-center">$1150</td>
                                                        <td class="text-center">$1150</td>
                                                        <td class="text-center">
                                                            <a href=""><i
                                                                    class="fa fa fa-pencil text-muted pr-2"></i></a>
                                                            <a href=""><i class="fa fa-trash text-danger"></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{-- Dashboard Links End --}}
                                </div>
                                <div>
                                    <div class="heading-2">
                                        <h3 class="title-3 fsz-15 grenadier-color">RFQ History</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-striped  table-bordered">
                                                <thead class="grenadier-bg text-white">
                                                    <tr>
                                                        <th scope="col" class="text-center">Order No</th>
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">Payment Id</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col" class="text-center">Date</th>
                                                        <th scope="col" class="text-center">Status</th>
                                                        <th scope="col">Total amount</th>
                                                        <th scope="col">Paid amount</th>
                                                        <th scope="col" class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" class="text-center">1</th>
                                                        <td>Lorem ipsum dolor,</td>
                                                        <td class="text-center">#5564a658</td>
                                                        <td>RFQ</td>
                                                        <td>30 May 2024</td>
                                                        <td class="text-center"><span
                                                                class="badge badge-primary">Deliverd</span></td>
                                                        <td class="text-center">$1150</td>
                                                        <td class="text-center">$1150</td>
                                                        <td class="text-center">
                                                            <a href=""><i
                                                                    class="fa fa fa-pencil text-muted pr-2"></i></a>
                                                            <a href=""><i class="fa fa-trash text-danger"></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{-- Dashboard Links End --}}
                                </div>
                            </div>
                            {{-- End --}}

                            {{-- contact Content --}}
                            @include('frontend.template_one.user.user_contact')

                            {{-- End --}}

                            {{-- Security Content --}}
                            @include('frontend.template_one.user.user_password')

                            {{-- End --}}

                        </div>
                    </div>
                    <!-- /.col-md-8 -->

                </div>
            </div>
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
