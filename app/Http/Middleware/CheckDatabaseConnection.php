<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class CheckDatabaseConnection
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            // Check database connection
            DB::connection()->getPdo();
        } catch (Throwable $e) {
            // Return an HTML response with a centered alert box
            return response("
                <!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Database Error</title>
                    <style>
                        body {
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            height: 100vh;
                            margin: 0;
                            background-color: white;
                            font-family: Arial, sans-serif;
                        }
                        .alert-box {
                            text-align: center;
                            background-color: #ffffff;
                            color: #721c24;
                            padding: 20px;
                            border: 2px solid #f5c6cb;
                            border-radius: 8px;
                            box-shadow: 0px 4px 6px rgba(0,0,0,0.2);
                            max-width: 400px;
                            width: 100%;
                        }
                        .alert-box h1 {
                            margin: 0 0 10px;
                            font-size: 1.5rem;
                        }
                        .alert-box p {
                            margin: 0;
                            font-size: 1rem;
                        }
                    </style>
                </head>
                <body>
                    <div class='alert-box'>
                        <h1>Database Connection Failed</h1>
                        <p>We are unable to connect to the database. Please try again later.</p>
                    </div>
                </body>
                </html>
            ", 500);
        }

        return $next($request);
    }
}
