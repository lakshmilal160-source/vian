<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageContent;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageContentController extends Controller
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Display listing
     */
    public function index()
    {
        $contents = PageContent::with('page')
            ->latest()
            ->get();

        return view('dashboard.page-content.index', compact('contents'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        $sections = config('custom.contents');
        $pages = Page::all();

        return view(
            'dashboard.page-content.create',
            compact('pages', 'sections')
        );
    }

    /**
     * Store new content
     */
    public function store(Request $request)
    {
        $request->validate([
            'page_id' => 'required|exists:pages,id',
            'section' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only([
            'page_id',
            'section',
            'title',
            'description'
        ]);

        $data['image'] = null;

        if ($request->hasFile('image')) {
            $data['image'] = $this->imageService->uploadAndResize(
                $request->file('image'),
                'uploads/page-content',
            );
        }

        PageContent::create($data);

        return redirect()
            ->route('admin.page-content.index')
            ->with('success', 'Page content added successfully');
    }

    /**
     * Edit form
     */
    public function edit(string $id)
    {
        $content = PageContent::findOrFail($id);
        $pages = Page::all();
        $sections = config('custom.contents');

        return view(
            'dashboard.page-content.edit',
            compact('content', 'pages', 'sections')
        );
    }

    /**
     * Update content
     */
    public function update(Request $request, string $id)
    {
        $content = PageContent::findOrFail($id);

        $request->validate([
            'page_id' => 'required|exists:pages,id',
            'section' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only([
            'page_id',
            'section',
            'title',
            'description'
        ]);

        $data['image'] = $content->image;



            if ($request->hasFile('image')) {
                // delete old image once
                if (
                    $content->image &&
                    Storage::disk('public')->exists($content->image)
                ) {
                    Storage::disk('public')->delete($content->image);
                }

                $data['image'] = $this->imageService->uploadAndResize(
                    $request->file('image'),
                    'uploads/page-content',
                );

            }
            // Remove image only if no new upload
            elseif ($request->remove_image == 1) {

                if (
                    $content->image &&
                    Storage::disk('public')->exists($content->image)
                ) {
                    Storage::disk('public')->delete($content->image);
                }

                $data['image'] = null;
            }
        $content->update($data);

        return redirect()
            ->route('admin.page-content.index')
            ->with('success', 'Page content updated successfully');
    }

    /**
     * Delete content + image
     */
    public function destroy(string $id)
    {
        $content = PageContent::findOrFail($id);

        // Delete image from storage
        if (
            $content->image &&
            Storage::disk('public')->exists($content->image)
        ) {
            Storage::disk('public')->delete($content->image);
        }

        $content->delete();

        return redirect()
            ->route('admin.page-content.index')
            ->with('success', 'Page content deleted successfully');
    }
}
