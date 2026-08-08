<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index(Request $request)
    {
        $query = Portfolio::query();

        if ($request->search) {

            $query->where('title', 'like', '%' . $request->search . '%');

        }

        $portfolios = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('dashboard.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        return view('dashboard.portfolio.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([

            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable',
            'project_url' => 'nullable|url',
            'sort_order' => 'nullable|integer',
            'status' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',

        ]);

        if ($request->hasFile('image')) {

            $data['image'] = $this->imageService->uploadAndResize(
                $request->file('image'),
                'uploads/portfolio',
            );
        }

        $data['status'] = $request->status ?? 1;

        Portfolio::create($data);

        return redirect()
            ->route('admin.portfolios.index')
            ->with('success', 'Portfolio created successfully.');
    }

    public function edit(Portfolio $portfolio)
    {
        return view('dashboard.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $data = $request->validate([

            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable',
            'project_url' => 'nullable|url',
            'sort_order' => 'nullable|integer',
            'status' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',

        ]);

        if ($request->remove_image == 1) {

            if ($portfolio->image && Storage::disk('public')->exists($portfolio->image)) {

                Storage::disk('public')->delete($portfolio->image);

            }

            $data['image'] = null;
        }

        if ($request->hasFile('image')) {

            if (
                $portfolio->image &&
                Storage::disk('public')->exists($portfolio->image)
            ) {
                Storage::disk('public')->delete($portfolio->image);
            }

            $data['image'] = $this->imageService->uploadAndResize(
                $request->file('image'),
                'uploads/portfolio',
            );
        }

        $data['status'] = $request->status ?? 0;

        $portfolio->update($data);

        return redirect()
            ->route('admin.portfolios.index')
            ->with('success', 'Portfolio updated successfully.');
    }

    public function destroy(Portfolio $portfolio)
    {
        if (
            $portfolio->image &&
            Storage::disk('public')->exists($portfolio->image)
        ) {
            Storage::disk('public')->delete($portfolio->image);
        }

        $portfolio->delete();

        return redirect()
            ->route('admin.portfolios.index')
            ->with('success', 'Portfolio deleted successfully.');
    }

    public function toggleStatus(Portfolio $portfolio)
    {
        $portfolio->update([
            'status' => !$portfolio->status
        ]);

        return response()->json([
            'success' => true
        ]);
    }
}