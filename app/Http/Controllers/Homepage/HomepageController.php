<?php
namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Services\AuthServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomepageController extends Controller
{
    public function index()
    {
        return view('page.HomePage', ['isProfilePage' => false]);
    }
}