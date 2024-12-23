<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Http;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        return response()->json([
            'App Name' => 'API app',
            'Page' => 'API home Without Data',
            'Status' => 'working',
        ]);
    }

    public function test(Request $request)
    {
        $user = DB::table('companies')->first();
        return response()->json([
            'status' => 'success',
            'name' => $user,
        ]);
    }

    public function signup(Request $request)
    {
        return view('Auth.signup');
    }

    //captcha signup
    // public function signup(Request $request)
    // {
    //     // Validate the incoming request (including the CAPTCHA)
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255|unique:users,email',
    //         'otp' => 'required|string|max:6',
    //         'password' => 'required|string|min:8|confirmed',
    //         'g-recaptcha-response' => 'required', // reCAPTCHA field validation
    //     ]);

    //     // Retrieve the CAPTCHA response from the request
    //     $recaptchaResponse = $request->input('g-recaptcha-response');
    //     $recaptchaSecret = env('RECAPTCHA_SECRET_KEY'); // Store secret in .env file for security

    //     // Verify the reCAPTCHA response by sending a POST request to Google's reCAPTCHA API
    //     $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
    //         'secret' => $recaptchaSecret,
    //         'response' => $recaptchaResponse,
    //     ]);

    //     $data = $response->json();

    //     // Check if reCAPTCHA validation was successful
    //     if (!$data['success']) {
    //         return back()->withErrors(['captcha' => 'Please verify that you are not a robot.']);
    //     }

    //     // If CAPTCHA is valid, proceed with user registration (or any other logic)
    //     // For example, create the user:
    //     Company::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password),
    //         // other fields...
    //     ]);

    //     // Redirect to a success page or login page after registration
    //     return redirect()->route('login')->with('success', 'Account created successfully!');
    // }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*?&#]/',
            ],
        ]);

        // Create a new company record
        $company = Company::create([
            'Company_Name' => $request->name,
            'Company_Super_Admin_Email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'App Name' => 'API app',
            'Page' => 'Register store',
            'Status' => $company,
        ]);
    }

    public function login(Request $request)
    {
        return view('Auth.login');
    }

    public function superadmindash(Request $request)
    {
        return view('Auth.SuperAdmin-Dashboard');
    }

    public function checkEmail(Request $request)
    {
        // Validate email format
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid email format.'], 400);
        }

        // Check if the email already exists
        $emailExists = Company::where('email', $request->email)->exists();

        // Return response based on email existence
        return response()->json(['exists' => $emailExists]);
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Generate a 6-digit OTP
        $otp = rand(100000, 999999);

        // Send OTP via email (example implementation)
        Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
            $message->to($request->email)->subject('Your OTP Code');
        });

        // Save OTP to the session or database for verification
        session(['otp' => $otp]);

        return response()->json(['message' => 'OTP sent successfully!']);
    }
}
