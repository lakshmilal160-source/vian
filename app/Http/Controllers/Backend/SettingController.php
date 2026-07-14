<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CountryCode;
use App\Models\Setting;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function edit()
    {
        $setting = Setting::first();
        $countryCodes = CountryCode::orderBy('nicename')->get();

        return view('dashboard.settings.edit', compact('setting','countryCodes'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'phone_1_country_code' => 'nullable',
            'phone_2_country_code' => 'nullable',
            'phone_1' => 'nullable|string|max:20',
            'phone_2' => 'nullable|string|max:20',

            'email' => 'nullable|email',

            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',

            'logo' => 'nullable|image',
            'favicon' => 'nullable|image',
        ]);

        $setting = Setting::first();

        if (!$setting) {
            $setting = new Setting();
        }

        $data = $request->except([
            'logo',
            'favicon'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Logo Upload
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('logo')) {

            if (
                $setting->logo &&
                Storage::disk('public')->exists($setting->logo)
            ) {
                Storage::disk('public')->delete($setting->logo);
            }

            $data['logo'] = $this->imageService->uploadAndResize(
                $request->file('logo'),
                'uploads/settings',
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Favicon Upload
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('favicon')) {

            if (
                $setting->favicon &&
                Storage::disk('public')->exists($setting->favicon)
            ) {
                Storage::disk('public')->delete($setting->favicon);
            }

            $data['favicon'] = $this->imageService->uploadAndResize(
                $request->file('favicon'),
                'uploads/settings',
            );
        }

        $setting->fill($data)->save();

        return redirect()
            ->route('admin.settings.edit')
            ->with('success', 'Settings updated successfully');
    }
}
