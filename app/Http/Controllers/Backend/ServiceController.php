<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index(Request $request)
    {
        $query = Service::query();

        // Search
        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filter
        if ($request->status !== null && $request->status !== '') {
            $query->where('status', $request->status);
        }

        // Sort
        switch ($request->sort) {
            case 'name_asc':
                $query->orderBy('title');
                break;

            case 'name_desc':
                $query->orderByDesc('title');
                break;

            case 'oldest':
                $query->oldest();
                break;

            case 'order':
                $query->orderBy('sort_order');
                break;

            default:
                $query->latest();
        }

        $services = $query->paginate(10)->withQueryString();

        return view('dashboard.service.index', compact('services'));
    }

    public function create()
    {
        return view('dashboard.service.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        // Upload icon
        if ($request->hasFile('icon')) {
            $data['icon'] = $this->imageService->uploadAndResize(
                $request->file('icon'),
                'uploads/services/icons',
            );
        }
        //upload image
        if ($request->hasFile('image')) {
            $data['image'] = $this->imageService->uploadAndResize(
                $request->file('image'),
                'uploads/services',
            );
        }

        Service::create($data);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    public function edit(string $id)
    {
        $service = Service::findOrFail($id);

        return view('dashboard.service.edit', compact('service'));
    }

    public function update(Request $request, string $id)
    {
        $service = Service::findOrFail($id);

        $data = $this->validatedData($request);

        $data['image'] = $service->image;
        $data['icon'] = $service->icon;

        /*
    |--------------------------------------------------------------------------
    | ICON UPLOAD / REMOVE
    |--------------------------------------------------------------------------
    */

        // upload new icon
        if ($request->hasFile('icon')) {

            if (
                $service->icon &&
                Storage::disk('public')->exists($service->icon)
            ) {
                Storage::disk('public')->delete($service->icon);
            }

            $data['icon'] = $this->imageService->uploadAndResize(
                $request->file('icon'),
                'uploads/services/icons',
            );
        }

        // remove icon
        elseif ($request->remove_icon == 1) {

            if (
                $service->icon &&
                Storage::disk('public')->exists($service->icon)
            ) {
                Storage::disk('public')->delete($service->icon);
            }

            $data['icon'] = null;
        }

        /*
    |--------------------------------------------------------------------------
    | MAIN IMAGE UPLOAD / REMOVE
    |--------------------------------------------------------------------------
    */

        // upload new image
        if ($request->hasFile('image')) {

            if (
                $service->image &&
                Storage::disk('public')->exists($service->image)
            ) {
                Storage::disk('public')->delete($service->image);
            }

            $data['image'] = $this->imageService->uploadAndResize(
                $request->file('image'),
                'uploads/services',
            );
        }

        // remove image
        elseif ($request->remove_image == 1) {

            if (
                $service->image &&
                Storage::disk('public')->exists($service->image)
            ) {
                Storage::disk('public')->delete($service->image);
            }

            $data['image'] = null;
        }

        $service->update($data);
        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);

        // Delete icon
        if (
            $service->icon &&
            Storage::disk('public')->exists($service->icon)
        ) {
            Storage::disk('public')->delete($service->icon);
        }

        // Delete image
        if (
            $service->image &&
            Storage::disk('public')->exists($service->image)
        ) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }

    private function validatedData(Request $request)
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:services,slug,' . $request->id,
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'canonical_url' => 'nullable|string',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string',
        ]) + [
            'slug' => $request->slug
                ? Str::slug($request->slug)
                : Str::slug($request->title),
            'status' => $request->has('status'),
        ];
    }
    //toggle status

    public function toggleStatus(Service $service)
    {
        $service->status = !$service->status;
        $service->save();

        return response()->json([
            'success' => true,
            'status' => $service->status,
        ]);
    }
}
