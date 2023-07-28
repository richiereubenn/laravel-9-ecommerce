<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$product->name}}</title>
</head>
<body>
    <p>Name : {{$product->name}}</p>
    <p>Description : {{$product->description}}</p>
    <p>Rp. {{$product->price}}</p>
    <p>Stock : {{$product->stock}}</p>
    <img src="{{url('storage/' . $product->image)}}" alt="" height="100px">
    <form action="{{route('index_product')}}">
        <button type="submit">Back</button>
    </form>
    <form action="{{route('edit_product', $product)}}" method="GET">
        <button type="submit">Edit</button>
    </form>
    <form action="{{route('add_to_cart', $product)}}" method="post">
        @csrf
        <input type="number" name="amount" value="1">
        <button type="submit">Add to cart</button>
    </form>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{$error}}</p>
    @endforeach
    @endif
</body>
</html>