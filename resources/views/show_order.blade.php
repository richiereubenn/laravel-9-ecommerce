<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Order</title>
</head>
<body>
    @php
        $total_price = 0;
    @endphp

    <p>ID : {{$order->id}}</p>
    <p>User : {{$order->user->name}}</p>
    @foreach ($transactions as $transaction)
    <br>
        <p>Product {{$transaction->product->name}}</p>
        <p>Amount {{$transaction->amount}}</p>
        @php
            $total_price += $transaction->product->price * $transaction->amount;
        @endphp

    @endforeach
    <div>
        <p>Total : {{$total_price}}</p>
    </div>

    @if ($order->is_paid == false && $order->payment_receipt == null)
        <form action="{{route('submit_payment_receipt', $order)}}" method="post" enctype="multipart/form-data">
        @csrf
            <label for="payment_receipt">Upload your payment</label> <br>
            <input type="file" name="payment_receipt" id="payment_receipt">
            <button type="submit">Submit payment</button>
        </form>
    @else
        <p>Payment Sucessfully</p>
    @endif
</body>
</html>