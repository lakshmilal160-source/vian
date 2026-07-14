<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * INDEX
     */
    public function index(Request $request)
    {
        $query = Client::query();

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */
        if ($request->filled('search')) {

            $query->where('name', 'LIKE', '%' . $request->search . '%');

        }

        $clients = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('dashboard.client.index', compact('clients'));
    }

    /**
     * CREATE
     */
    public function create()
    {
        return view('dashboard.client.create');
    }

    /**
     * STORE
     */
    public function store(Request $request)
    {
        $data = $request->validate([

            'name' => 'required|string|max:255',
            'website' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'status' => 'required|boolean',

        ]);

        /*
        |--------------------------------------------------------------------------
        | SLUG
        |--------------------------------------------------------------------------
        */
        $data['slug'] = Str::slug($request->name);

        /*
        |--------------------------------------------------------------------------
        | LOGO UPLOAD
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('logo')) {

            $data['logo'] = $this->imageService->uploadAndResize(
                $request->file('logo'),
                'uploads/clients',
                400
            );

        }

        Client::create($data);

        return redirect()
            ->route('admin.clients.index')
            ->with('success', 'Client created successfully.');
    }

    /**
     * EDIT
     */
    public function edit(Client $client)
    {
        return view('dashboard.client.edit', compact('client'));
    }

    /**
     * UPDATE
     */
    public function update(Request $request, Client $client)
    {
        $data = $request->validate([

            'name' => 'required|string|max:255',
            'website' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'status' => 'required|boolean',

        ]);

        /*
        |--------------------------------------------------------------------------
        | SLUG
        |--------------------------------------------------------------------------
        */
        $data['slug'] = Str::slug($request->name);

        /*
        |--------------------------------------------------------------------------
        | REMOVE LOGO
        |--------------------------------------------------------------------------
        */
        if ($request->remove_logo == 1) {

            if (
                $client->logo &&
                Storage::disk('public')->exists($client->logo)
            ) {

                Storage::disk('public')->delete($client->logo);

            }

            $data['logo'] = null;
        }

        /*
        |--------------------------------------------------------------------------
        | NEW LOGO
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('logo')) {

            /*
            |--------------------------------------------------------------------------
            | DELETE OLD LOGO
            |--------------------------------------------------------------------------
            */
            if (
                $client->logo &&
                Storage::disk('public')->exists($client->logo)
            ) {

                Storage::disk('public')->delete($client->logo);

            }

            $data['logo'] = $this->imageService->uploadAndResize(
                $request->file('logo'),
                'uploads/clients',
                400
            );
        }

        $client->update($data);

        return redirect()
            ->route('admin.clients.index')
            ->with('success', 'Client updated successfully.');
    }

    /**
     * DELETE
     */
    public function destroy(Client $client)
    {
        /*
        |--------------------------------------------------------------------------
        | DELETE LOGO
        |--------------------------------------------------------------------------
        */
        if (
            $client->logo &&
            Storage::disk('public')->exists($client->logo)
        ) {

            Storage::disk('public')->delete($client->logo);

        }

        $client->delete();

        return redirect()
            ->route('admin.clients.index')
            ->with('success', 'Client deleted successfully.');
    }

    /**
     * TOGGLE STATUS
     */
    public function toggleStatus(Client $client)
    {
        $client->update([

            'status' => !$client->status

        ]);

        return response()->json([

            'success' => true

        ]);
    }
}