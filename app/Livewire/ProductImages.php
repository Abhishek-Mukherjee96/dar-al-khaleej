<?php

namespace App\Livewire;

use App\Models\Gallery;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\ProductImage;

class ProductImages extends Component
{
    use WithFileUploads;

    public $products;
    public $product_id;
    public $images = [];

    public function mount()
    {
        $this->products = Product::with('category')->where('status', 1)->get();
    }

    protected function rules()
    {
        return [
            'product_id' => 'required|exists:products,product_id',
            'images.*' => 'image|max:2048',
        ];
    }

    public function upload()
    {
        $this->validate();

        foreach ($this->images as $image) {
            $path = $image->store('products', 'public');

            Gallery::create([
                'product_id' => $this->product_id,
                'image_path' => $path,
            ]);
        }

        $this->reset(['images']);
        session()->flash('success', 'Images uploaded successfully.');
    }

    public function render()
    {
        return view('livewire.product-images');
    }
}
