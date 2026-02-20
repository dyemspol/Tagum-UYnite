<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Baranggay;
use App\Services\HomepageServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Report;
use App\Models\User;
use App\Models\Comment;
use App\Models\Reaction;
use App\Services\CloudinaryServices;
use App\Services\UserVerification;
use Illuminate\Support\Facades\Log;



class AdminController extends Controller
{
}