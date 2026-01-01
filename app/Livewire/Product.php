<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product as ProductModel;
use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Product extends Component
{
    use WithFileUploads;
    public $products, $categories;

    public $product_id;
    public $category_id;
    public $product_name;
    public $description;
    public $status = 1;
    public $thumbnail;
    public $gallery = [];
    public $thumbnail_old;

    public $isEdit = false;
    public $showForm = false;

    protected function rules()
    {
        return [
            'category_id' => 'required|exists:categories,category_id',
            'product_name' => 'required|string|max:255|unique:products,product_name,' . $this->product_id . ',product_id',
            'description' => 'required|string',
            'thumbnail' => $this->isEdit ? 'nullable|image|max:2048' : 'required|image|max:2048',
            'gallery.*' => 'nullable|image|max:2048',
        ];
    }

    public function mount()
    {
        $this->categories = Category::where('status', 1)->get();
        $this->loadProducts();
    }

    public function loadProducts()
    {
        $this->products = ProductModel::with('category')->latest()->get();
    }

    public function addProduct()
    {
        $this->resetForm();
        $this->showForm = true;
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate();

        $thumbPath = $this->thumbnail->store('products/thumbs', 'public');

        $product = ProductModel::create([
            'category_id' => $this->category_id,
            'product_name' => $this->product_name,
            'slug' => Str::slug($this->product_name),
            'description' => $this->description,
            'thumbnail' => $thumbPath,
            'status' => $this->status,
        ]);

        if ($this->gallery) {
            foreach ($this->gallery as $img) {
                $path = $img->store('products/gallery', 'public');

                Gallery::create([
                    'product_id' => $product->product_id,
                    'image_path' => $path,
                ]);
            }
        }

        $this->afterSave();
    }

    public function edit($id)
    {
        $product = ProductModel::findOrFail($id);

        $this->product_id = $product->product_id;
        $this->category_id = $product->category_id;
        $this->product_name = $product->product_name;
        $this->description = $product->description;
        $this->status = $product->status;
        $this->thumbnail_old = $product->thumbnail;

        $this->showForm = true;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate();

        $data = [
            'category_id' => $this->category_id,
            'product_name' => $this->product_name,
            'slug' => Str::slug($this->product_name),
            'description' => $this->description,
            'status' => $this->status,
        ];

        // Replace thumbnail if uploaded
        if ($this->thumbnail) {
            if ($this->thumbnail_old && Storage::disk('public')->exists($this->thumbnail_old)) {
                Storage::disk('public')->delete($this->thumbnail_old);
            }

            $data['thumbnail'] = $this->thumbnail->store('products/thumbs', 'public');
        }

        ProductModel::where('product_id', $this->product_id)->update($data);

        // Add new gallery images
        if ($this->gallery) {
            foreach ($this->gallery as $img) {
                $path = $img->store('products/gallery', 'public');

                Gallery::create([
                    'product_id' => $this->product_id,
                    'image_path' => $path,
                ]);
            }
        }

        $this->afterSave();
    }

    public function delete($id)
    {
        ProductModel::findOrFail($id)->delete();
        $this->loadProducts();
    }

    public function cancel()
    {
        $this->resetForm();
        $this->showForm = false;
        $this->isEdit = false;
    }

    private function afterSave()
    {
        $this->resetForm();
        $this->loadProducts();
        $this->showForm = false;
        $this->isEdit = false;
        session()->flash('success', 'Product saved successfully.');
    }

    private function resetForm()
    {
        $this->product_id = null;
        $this->category_id = '';
        $this->product_name = '';
        $this->description = '';
        $this->status = 1;
        $this->thumbnail = null;
        $this->thumbnail_old = null;
        $this->gallery = [];
    }

    public function render()
    {
        return view('livewire.product');
    }
}
