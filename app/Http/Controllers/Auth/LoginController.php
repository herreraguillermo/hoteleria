<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    /* protected function authenticated($request, $user)
    {
        if ($user->isAdmin()) {
            return redirect('admin.index');
        }

        return redirect('../admin/index');
    } */
    protected $redirectTo = '/admin/reservas';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
