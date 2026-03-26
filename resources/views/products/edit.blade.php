<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Product</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <h2>Edit Product</h2>

  <!-- Back Button -->
  <a href="{{ route('products.index') }}" class="btn btn-default">Back to Products</a>

  <br><br>

  <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    
    @csrf
    @method('PUT')

    <!-- ID -->
    <div class="form-group">
      <label>ID:</label>
      <input type="text" class="form-control" value="{{ $product->id }}" readonly>
    </div>

    <!-- Image -->
    <div class="form-group">
      <label>Product Image:</label>
      <input type="file" name="image" class="form-control">

      <!-- Old Image -->
      @if($product->image)
        <br>
        <img src="{{ asset('images/'.$product->image) }}" width="80">
      @endif
    </div>

    <!-- Name -->
    <div class="form-group">
      <label>Product Name:</label>
      <input 
        type="text" 
        name="name"
        class="form-control" 
        value="{{ old('name', $product->name) }}"
      >
    </div>

    <!-- SKU -->
    <div class="form-group">
      <label>SKU:</label>
      <input 
        type="text" 
        name="sku"
        class="form-control" 
        value="{{ old('sku', $product->sku) }}"
      >
    </div>

    <!-- Price -->
    <div class="form-group">
      <label>Price:</label>
      <input 
        type="number" 
        name="price"
        class="form-control" 
        value="{{ old('price', $product->price) }}"
      >
    </div>

    <!-- Status -->
    <div class="form-group">
      <label>Status:</label>
      <select name="status" class="form-control">
        <option value="Active" {{ $product->status == 'Active' ? 'selected' : '' }}>Active</option>
        <option value="Inactive" {{ $product->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
      </select>
    </div>

    <!-- Submit -->
    <button type="submit" class="btn btn-success">Update Product</button>
  </form>
</div>
</body>
</html>