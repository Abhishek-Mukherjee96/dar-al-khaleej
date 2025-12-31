<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category as CategoryModel;
use Illuminate\Support\Str;

class Category extends Component
{
    public $categories;

    public $category_id;
    public $cat_name;
    public $slug;
    public $status = 1;

    public $isEdit = false;
    public $showForm = false;

    protected function rules()
    {
        return [
            'cat_name' => 'required|string|max:255|unique:categories,cat_name,' . $this->category_id . ',category_id',
            'status' => 'required|in:0,1',
        ];
    }

    protected $messages = [
        'cat_name.required' => 'Category name is required.',
        'cat_name.unique' => 'Category name already exists.',
        'status.required' => 'Status is required.',
    ];

    public function mount()
    {
        $this->loadCategories();
    }

    public function loadCategories()
    {
        $this->categories = CategoryModel::latest()->get();
    }

    // Open Add Form
    public function addCategory()
    {
        $this->resetForm();
        $this->isEdit = false;
        $this->showForm = true;
    }

    // Store Category
    public function store()
    {
        $this->validate();

        CategoryModel::create([
            'cat_name' => $this->cat_name,
            'slug' => Str::slug($this->cat_name),
            'status' => $this->status,
        ]);

        session()->flash('success', 'Category created successfully.');

        $this->resetForm();
        $this->loadCategories();
        $this->showForm = false;
    }

    // Edit Category
    public function edit($id)
    {
        $category = CategoryModel::where('category_id', $id)->firstOrFail();

        $this->category_id = (int) $category->category_id;
        $this->cat_name = $category->cat_name;
        $this->slug = $category->slug;
        $this->status = (int) $category->status;

        $this->isEdit = true;
        $this->showForm = true;
    }

    // Update Category
    public function update()
    {
        $this->validate();

        CategoryModel::where('category_id', $this->category_id)->update([
            'cat_name' => $this->cat_name,
            'slug' => Str::slug($this->cat_name),
            'status' => $this->status,
        ]);
        session()->flash('success', 'Category updated successfully.');

        $this->resetForm();
        $this->loadCategories();
        $this->isEdit = false;
        $this->showForm = false;
    }

    // Delete Category
    public function delete($id)
    {
        CategoryModel::findOrFail($id)->delete();
        $this->loadCategories();
    }

    private function resetForm()
    {
        $this->category_id = null;
        $this->cat_name = '';
        $this->slug = '';
        $this->status = 1;
    }

    public function cancel()
    {
        $this->resetForm();
        $this->resetValidation();
        $this->showForm = false;
        $this->isEdit = false;
    }

    public function render()
    {
        return view('livewire.category');
    }
}
