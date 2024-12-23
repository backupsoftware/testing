<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function showForm(Request $request)
    {
        // Retrieve the current form type
        $formType = DB::table('settings')->value('formtype');

        // Validate the form type
        if (!in_array($formType, ['basic', 'otp', 'captcha'])) {
            abort(404, "Form not found.");
        }

        // Load the corresponding form view
        return view("signup.$formType", [
            'formType' => $formType,
        ]);
    }

    // Update form type via API
    public function updateFormType(Request $request)
    {
        // Validate the incoming request to ensure formtype is valid
        $validated = $request->validate([
            'formtype' => 'required|string|in:basic,otp,captcha',
        ]);
    
        // Update the formtype in the settings table
        DB::table('settings')->update(['formtype' => $validated['formtype']]);
    
        // Return a success response
        return response()->json(['message' => 'Form type updated successfully']);
    }
    
}
