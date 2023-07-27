<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\CrmLog;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        Auth::user()->togglestatus(1)->save();

        //create log
        $savelog = new CrmLog();
        $savelog->module_name = 'Session';
        $savelog->action = 'Logged in.';
        $savelog->user_id = auth()->user()->id;
        $savelog->user_name = $savelog->user_id == 0 ? 'System' : auth()->user()->first_name.' '.auth()->user()->last_name;
        $savelog->affected_row_copy = '{}';
        $savelog->save();

        return '/dashboard';
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
      Auth::user()->togglestatus(0)->save();

      //create log
      $savelog = new CrmLog();
      $savelog->module_name = 'Session';
      $savelog->action = 'Logged out.';
      $savelog->user_id = auth()->user()->id;
      $savelog->user_name = $savelog->user_id == 0 ? 'System' : auth()->user()->first_name.' '.auth()->user()->last_name;
      $savelog->affected_row_copy = '{}';
      $savelog->save();

      Auth::guard('web')->logout();

      $request->session()->invalidate();

      $request->session()->regenerateToken();

      return redirect('/');
    }
}
