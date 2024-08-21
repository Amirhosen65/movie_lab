@extends('layouts.dashboard_master')

@section('content')

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>{{ $order->order_no }}</h1>
            <a href="{{ route('order.delete', $order->id) }}" class="btn btn-danger text-align-center">Delete</a>
        </div>

    </div>
</div>

@if (auth()->user()->role == 'administrator')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3><b>Name:</b> {{ $order->name }}</h3>
            </div>
            <div class="card-body">
                <ul>
                    <b>Date:</b> {{ $order->created_at }}
                </ul>
                <ul>
                    <b>Email:</b> {{ $order->email }}
                </ul>
                <ul>
                    <b>Phone:</b> {{ $order->phone }}
                </ul>
                <ul>
                    <b>Gender:</b> {{ $order->gender }}
                </ul>
                <ul>
                    <b>Area:</b> {{ $order->area }}
                </ul>
                <ul>
                    <b>Address:</b> {{ $order->address }}
                </ul>
                <ul>
                    <b>Dress Name:</b> {{ $order->dress_name }}
                </ul>
                <ul>
                    <b>Dress Details:</b> {{ $order->dress_details }}
                </ul>
                <ul>
                    <b>Oder Status:</b> {{ $order->status }}
                </ul>
                <h3>Change Status</h3>
                <form action="{{ route('order.update', $order->id) }}" method="POST">
                    @csrf
                    <select name="status" id=""  class="form-select">

                        <option selected value="{{ $order->status }}">{{ $order->status }}</option>
                        <option value="Hold">Hold</option>
                        <option value="Proccessing">Proccessing</option>
                        <option value="Completed">Completed</option>
                        <option value="Cancel">Cancel</option>
                        <option value="Pending">Pending</option>

                    </select>
                    <button class="btn btn-primary mt-3" type="submit">Update Status</button>
                </form>
            </div>
        </div>
    </div>
</div>

@else
<h2 class="text-warning text-center">Only Administrator can access this page!</h2>
@endif

@endsection



