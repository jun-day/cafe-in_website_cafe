<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        }

        // JIKA AKSES ADMIN & BELUM LOGIN
        if ($request->is('admin/*')) {
            return route('admin.login');
        }

        // DEFAULT
        return route('customer.index');
    }
}
