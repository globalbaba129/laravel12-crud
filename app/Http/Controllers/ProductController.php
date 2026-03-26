<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = product::orderby('created_at','desc')->get();
        return view('products.index',['products'=> $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    // Validation
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'sku' => 'required|string|unique:products,sku',
        'price' => 'required|numeric|min:0',
        'status' => 'required|in:Active,Inactive',
        'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Upload Image
    $imageName = null;
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $imageName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $imageName);
    }

    // Save to DB
    Product::create([
        'name' => $request->name,
        'sku' => $request->sku,
        'price' => $request->price,
        'status' => $request->status,
        'image' => $imageName, // only filename
    ]);

    return redirect('/')->with('success', 'Product added successfully!');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
  public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('products.edit', compact('product'));
}
    /**
     * Update the specified resource in storage.
     */
  /**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    // Find product
    $product = Product::findOrFail($id);

    // Validation
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'sku' => 'required|string|unique:products,sku,' . $id,
        'price' => 'required|numeric|min:0',
        'status' => 'required|in:Active,Inactive',
       'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Handle new image upload
    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($product->image && file_exists(public_path('images/' . $product->image))) {
            unlink(public_path('images/' . $product->image));
        }

        // Upload new image
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);

        // Update image field
        $product->image = $imageName;
    }

    // Update other fields
    $product->name = $request->name;
    $product->sku = $request->sku;
    $product->price = $request->price;
    $product->status = $request->status;

    $product->save();

    // Redirect back with success message
    return redirect()->route('products.index')
                     ->with('success', 'Product updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
 public function destroy(string $id)
{
    // Find product
    $product = Product::findOrFail($id);

    // Delete image if exists
    if ($product->image && file_exists(public_path('images/' . $product->image))) {
        unlink(public_path('images/' . $product->image));
    }

    // Delete product from DB
    $product->delete();

    // Redirect with success message
    return redirect()->route('products.index')
                     ->with('success', 'Product deleted successfully!');
}
}
