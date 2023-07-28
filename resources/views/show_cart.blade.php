<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
</head>
<body>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{$error}}</p>
    @endforeach
    @endif

    @php
        $total_price = 0;
    @endphp
    @foreach ($carts as $cart)
        <img src="{{url('storage/' . $cart->product->image)}}" alt="" height="100px">
        <p>Name : {{$cart->product->name}}</p>
        <form action="{{route('update_cart', $cart)}}" method="post">
            @method('patch')
            @csrf
            <input type="number" name="amount" value={{$cart->amount}}>
            <button type="submit">Update Amount</button>
        </form>

        <form action="{{route('delete_cart', $cart)}}" method="post">
            @method('delete')
            @csrf
            <button type="submit">Delete Item</button>
        </form>

        @php
            $total_price += $cart->product->price * $cart->amount;
        @endphp
    @endforeach
    <div>
        <p>Total Price : Rp {{$total_price}}</p>
    </div>
    <form action="{{route('checkout')}}" method="post">
        @csrf
        <button type="submit">Checkout</button>
    </form>
</body>
</html>