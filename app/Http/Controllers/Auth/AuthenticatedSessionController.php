<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $auth = $request->authenticate();
        if(!$auth){
            return redirect()->route('login')->withErrors([
                'email' => trans('auth.failed'),
            ])->onlyInput('email');
        }
        $user = User::where('email',$request->email)->first();
        if(!$user->status){
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Account is disabled',
            ])->onlyInput('email');
        }
        $request->session()->regenerate();
        if($request->current_route){
            return redirect()->to($request->current_route);
        }
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
