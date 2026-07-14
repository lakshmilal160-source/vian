<?php

namespace App\Http\Controllers\Backend;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Services\ImageService;

class TestimonialController extends Controller
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * LIST
     */
    public function index(Request $request)
    {
        $query = Testimonial::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('company', 'like', "%{$search}%");
            });
        }

        // Sort
        switch ($request->sort) {
            case 'oldest':
                $query->oldest();
                break;

            case 'sort_order':
                $query->orderBy('sort_order', 'asc');
                break;

            default:
                $query->latest();
                break;
        }

        $testimonials = $query->paginate(10)->withQueryString();

        return view('dashboard.testimonial.index', compact('testimonials'));
    }

    /**
     * CREATE
     */
    public function create()
    {
        return view('dashboard.testimonial.create');
    }

    /**
     * STORE
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'message' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'rating' => 'nullable|integer|min:1|max:5',
            'status' => 'required|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        // Upload image
        if ($request->hasFile('image')) {
            $data['image'] = $this->imageService->uploadAndResize(
                $request->file('image'),
                'uploads/testimonials',
            );
        }

        Testimonial::create($data);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    /**
     * EDIT
     */
    public function edit(Testimonial $testimonial)
    {
        return view(
            'dashboard.testimonial.edit',
            compact('testimonial')
        );
    }

    /**
     * UPDATE
     */
    public function update(
        Request $request,
        Testimonial $testimonial
    ) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'message' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'rating' => 'nullable|integer|min:1|max:5',
            'status' => 'required|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        /**
         * Remove existing image
         */
        if ($request->remove_image == 1) {
            if (
                $testimonial->image &&
                Storage::disk('public')->exists($testimonial->image)
            ) {
                Storage::disk('public')->delete(
                    $testimonial->image
                );
            }

            $data['image'] = null;
        }

        /**
         * Upload new image
         */
        if ($request->hasFile('image')) {
            if (
                $testimonial->image &&
                Storage::disk('public')->exists($testimonial->image)
            ) {
                Storage::disk('public')->delete(
                    $testimonial->image
                );
            }

            $data['image'] = $this->imageService->uploadAndResize(
                $request->file('image'),
                'uploads/testimonials',
            );
        }

        $testimonial->update($data);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    /**
     * DELETE
     */
    public function destroy(Testimonial $testimonial)
    {
        if (
            $testimonial->image &&
            Storage::disk('public')->exists(
                $testimonial->image
            )
        ) {
            Storage::disk('public')->delete(
                $testimonial->image
            );
        }

        $testimonial->delete();

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }

    /**
     * AJAX STATUS TOGGLE
     */
    public function toggleStatus(
        Testimonial $testimonial
    ) {
        $testimonial->status =
            !$testimonial->status;

        $testimonial->save();

        return response()->json([
            'success' => true,
            'status' => $testimonial->status,
        ]);
    }
}