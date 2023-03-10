<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function files(Product $product, Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:2048'
        ]);

        $url = $request->file('file')->store('products', 'public');

        $product->images()->create([
            'url' => $url
        ]);
    }

    public function deleteImage(Image $image)
    {
        Storage::disk('public')->delete([$image->url]);
        $image->delete();
        $this->product = $this->product->fresh();
    }
}
