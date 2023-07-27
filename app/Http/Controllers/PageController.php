<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\User;
use App\Models\UserLevel;


use DB;

class PageController extends Controller
{
    public function indexPage()
    {
      if (Auth::check()) {
        // The user is logged in...
        return redirect()->route('user.dash');
      }
      else {
        return redirect()->route('get.login');
      }

    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function dashboardPage()
    {

        return view('dashboard.view', array(
          'pageTitle' => 'Dashboard',
          'pageDescription' => 'Test description',
        ));
    }
}


 ?>
