@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Shopping Cart</h1>

    @if($cartItems->isEmpty())
        <div class="alert alert-info">Your cart is empty</div>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>${{ number_format($item->product->price, 2) }}</td>
                    <td>
                        <form action="{{ route('cart.update', $item) }}" method="POST">
                            @csrf
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1">
                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        </form>
                    </td>
                    <td>${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $item) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-end">
            <h4>Total: ${{ number_format($total, 2) }}</h4>
            <a href="{{ route('checkout') }}" class="btn btn-success btn-lg">Proceed to Checkout</a>
        </div>
    @endif
</div>
@endsection
