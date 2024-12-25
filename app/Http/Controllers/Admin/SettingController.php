<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Setting;


class SettingController extends Controller
{

    public function index()
    {
        $settings = Setting::all()->groupBy('type');
        return view('dashboard.settings.index', compact('settings'));
    }


    public function update(Request $request)
    {
        try {
            $settings = Setting::all();
            foreach ($settings as $setting) {
                // Check if the key exists in the request
                if ($request->has($setting->key)) {
                    // If the input type is 'file', handle file upload
                    if ($setting->input_type === 'file') {
                        $file = $request->file($setting->key);

                        if ($file) {
                            // Delete the old file if it exists
                            if ($setting->value && Storage::exists('public/uploads/settings/' . $setting->value)) {
                                Storage::delete('public/uploads/settings/' . $setting->value);
                            }

                            // Store the new file and save its name in the database
                            $fileName = $file->store('uploads/settings', 'public');
                            $setting->value = basename($fileName);
                        }
                    } else {
                        // For other types, directly save the value
                        $setting->value = $request->input($setting->key);
                    }

                    $setting->save();
                }
            }
            toastr()->success(translate_message('success_updated'));
        } catch (\Exception $exception) {

            toastr()->error($exception->getMessage());
        }
        return redirect()->back();
    }

}
