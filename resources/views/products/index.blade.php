<!DOCTYPE html>
<html lang="en">
<head>
  <title>Products CRUD - Static</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">
<h1 class="bg-dark text-center">Laravel=12 php=8.2 CRUD</h1>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

  <!-- Add Button -->
<a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>

  <br><br>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>SKU</th>
        <th>Price</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
    @forelse($products as $product)
    <tr>
        <td>{{ $product->id }}</td>

        <!-- Image -->
        <td>
            @if($product->image)
                <img src="{{ asset('images/'.$product->image) }}" width="60">
            @else
                No Image
            @endif
        </td>

        <td>{{ $product->name }}</td>
        <td>{{ $product->sku }}</td>
        <td>{{ $product->price }}</td>

        <!-- Status -->
        <td>
            @if($product->status == 'Active')
                <span class="label label-success">Active</span>
            @else
                <span class="label label-danger">Inactive</span>
            @endif
        </td>

        <!-- Actions -->
        <td>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>

            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
            </form>
        </td>
    </tr>

    @empty
    <tr>
        <td colspan="7" class="text-center text-danger">
            No Products Found
        </td>
    </tr>
    @endforelse
</tbody>
  </table>
</div>

</body>
</html>