<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class AuthenticatedSessionController extends Controller
{
    protected $guard = 'web';
    protected $home = '/';

    public function __construct(Request $request)
    {
        // Route::is('admin.login')
        if ($request->is('admin/*')) {
            $this->guard = 'admin';
            $this->home = 'admin/home';
        }
    }

    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if ($this->guard == 'web'){
            return view('website.ajax.login');
        }
        return view('dashboard.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->guard = $this->guard;

        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended($this->home);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard($this->guard)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect($this->home);
    }
}
