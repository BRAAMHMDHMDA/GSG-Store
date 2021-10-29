@extends('dashboard.layouts.app')

@section('content_title', 'orders List')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('orders.index')}}">orders</a></li>
    <li class="breadcrumb-item active">orders List</li>
@endsection

{{--@section('breadcrumb-right')--}}
{{--    <a href="{{ route('orders.create') }}">--}}
{{--        <button type="button" class="btn btn-primary"><i data-feather='plus'></i> Add New order</button>--}}
{{--    </a>--}}
{{--@endsection--}}

@section('content')
    <div class="card">
    <div class="table-responsive">
        @if(count($orders)!= 0)
            <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Number</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Payment Status</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <span class="font-weight-bold">#{{ $order->number }}</span>
                        </td>
                        <td>{{ $order->user->name ?? 'Guest' }}</td>
                        <td>{{ $order->total }}$</td>
                        <td>
                            @if( $order->payment_status == 'paid')
                                <span class="badge badge-pill badge-light-success mr-1">{{$order->payment_status}}</span>
                            @else
                                <span class="badge badge-pill badge-light-warning mr-1">{{$order->payment_status}}</span>
                            @endif
                        </td>
                        <td>{{ $order->created_at->format('d M Y, g:i a') }}</td>
                        <td>
                            <a class="me-25" href="{{route('orders.show',$order->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Preview This Order">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye font-medium-2 text-body">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </a>
{{--                            <form action="{{ route('orders.destroy', $order->id) }}" method="post"--}}
{{--                                  style="display: inline-block">--}}
{{--                                {{ csrf_field() }}--}}
{{--                                {{ method_field('delete') }}--}}
{{--                                <button type="button" class="delete btn btn-sm btn-danger"><i data-feather='trash-2'></i></button>--}}
{{--                            </form><!-- end of form -->--}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            <div class="card-footer">
               {{ $orders->links() }}
            </div>
        @else
            <div class="card-body alert-danger">
                <h2 style="color: red">There Are No Orders Yet.. *_*</h2>
            </div>
        @endif

    </div>
    </div>
    </div>
@endsection
