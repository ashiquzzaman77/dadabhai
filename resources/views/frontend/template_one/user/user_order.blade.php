<div class="tab-pane fade" id="order" role="tabpanel" aria-labelledby="order-tab">
    <div>
        <div class="heading-2">
            <h3 class="title-3 fsz-15 grenadier-color">Orders</h3>
        </div>

        @php
            $orders = App\Models\User\Order::where('user_id', Auth::user()->id)
                ->latest()
                ->get();
        @endphp

        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped  table-bordered">
                    <thead class="grenadier-bg text-white">
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">Invoice No</th>
                            <th scope="col">Order Number</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($orders as $key => $order)
                            <tr>
                                <th scope="row" class="text-center">{{ $key + 1 }}</th>
                                <td>{{ $order->invoice_number }}</td>
                                <td>{{ $order->order_number }}</td>
                                <td>Tk {{ $order->total_amount }}</td>
                                <td>{{ $order->order_date }}</td>
                                <td>{{ $order->payment_method }}</td>
                                <td class="text-center">
                                    @if ($order->status == 'pending')
                                        <span class="badge badge-danger">{{ $order->status }}</span>
                                    @elseif($order->status == 'processing')
                                        <span class="badge badge-primary">{{ $order->status }}</span>
                                    @elseif($order->status == 'shipped')
                                        <span class="badge badge-info">{{ $order->status }}</span>
                                    @elseif($order->status == 'delivered')
                                        <span class="badge badge-danger">{{ $order->status }}</span>
                                    @elseif($order->status == 'cancelled')
                                        <span class="badge badge-danger">{{ $order->status }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ $order->status }}</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('template.one.user.order.details',$order->id) }}"><i class="fa fa fa-pencil text-muted pr-2"></i></a>

                                    <a href=""><i class="fa fa-trash text-danger"></i></a>
                                    
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        {{-- Dashboard Links End --}}
    </div>
</div>
