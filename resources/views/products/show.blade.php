<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $product->name }} Details</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <h2>Product Details</h2>

  <a href="{{ route('products.index') }}" class="btn btn-default">Back to Products</a>
  <br><br>

  <div class="row">
    <div class="col-md-6">
      @if($product->image)
        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="width:100%; height:auto;">
      @else
        <img src="https://via.placeholder.com/400" alt="No Image" style="width:100%; height:auto;">
      @endif
    </div>

    <div class="col-md-6">
      <h3>{{ $product->name }}</h3>
      <p><strong>SKU:</strong> {{ $product->sku }}</p>
      <p><strong>Price:</strong> ${{ $product->price }}</p>
      <p><strong>Status:</strong>
        @if($product->status === 'Active')
          <span class="label label-success">{{ $product->status }}</span>
        @else
          <span class="label label-danger">{{ $product->status }}</span>
        @endif
      </p>
      <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
      <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>