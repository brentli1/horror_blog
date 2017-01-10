<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index() { return view('admin/index'); }
  public function tags() {
    // $tags = get current tags
    return view('admin/tags'); 
  }
}
