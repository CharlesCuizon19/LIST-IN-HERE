<?php

namespace App\Http\Controllers;

use App\Models\CategoryType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CategoryType::latest()->paginate(10);
        return view('admin.category_types.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category_types.create');
    }

    /**
     * Store a newly created category.
     */
    public function store(Request $request)
    {
        Log::info('CategoryType store called', ['request_data' => $request->all()]);

        try {
            $validated = $request->validate([
                'category_name' => 'required|string|max:255|unique:category_types,category_name',
            ]);

            CategoryType::create($validated);

            Log::info('CategoryType created successfully', [
                'data' => $validated
            ]);

            return redirect()
                ->route('admin.category-types.index')
                ->with('success', 'Category type created successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Validation failed', ['errors' => $e->errors()]);
            throw $e;
        } catch (\Exception $e) {
            Log::error('Error storing category type', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);

            return back()->with('error', 'Something went wrong. Please check logs.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryType $category)
    {
        return view('admin.category_types.edit', compact('category'));
    }

    public function update(Request $request, CategoryType $category)
    {
        Log::info('CategoryType update called', [
            'category_id' => $category->id,
            'request_data' => $request->all(),
        ]);

        $validated = $request->validate([
            'category_name' => 'required|string|max:255|unique:category_types,category_name,' . $category->id,
        ]);

        $category->update($validated);

        Log::info('CategoryType updated successfully', [
            'id' => $category->id,
            'updated_data' => $validated,
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category type updated successfully.');
    }

    public function destroy(CategoryType $category)
    {
        $category->delete();

        Log::info('CategoryType deleted', ['id' => $category->id]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category type deleted successfully.');
    }
}
