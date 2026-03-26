<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Product</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <h2>Create Product</h2>

  <!-- Back Button -->
  <a href="/" class="btn btn-secondary">Back to Products</a>

  <br><br>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

       <!-- image -->
    <div class="form-group">
        <label for="image">Product image:</label>
        <input type="file" class="form-control" id="image" name="image" placeholder="Enter product name" value="{{ old('image') }}">
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <!-- Name -->
    <div class="form-group">
        <label for="name">Product Name:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" value="{{ old('name') }}">
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <!-- SKU -->
    <div class="form-group">
        <label for="sku">SKU:</label>
        <input type="text" class="form-control" id="sku" name="sku" placeholder="Enter SKU" value="{{ old('sku') }}">
        @error('sku')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <!-- Price -->
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" class="form-control" id="price" name="price" placeholder="Enter price" value="{{ old('price') }}">
        @error('price')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <!-- Status -->
    <div class="form-group">
        <label for="status">Status:</label>
        <select class="form-control" id="status" name="status">
            <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
            <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
        @error('status')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <!-- Submit -->
    <button type="submit" class="btn btn-success">Save Product</button>
</form>
</div>
</body>
</html>