<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speaker;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware(['auth', 'admin']);
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\View\View
   */
  public function index()
  {
    $totalSpeakers = Speaker::count();
    $recentSpeakers = Speaker::latest()->take(5)->get();

    return view('admin.dashboard', compact('totalSpeakers', 'recentSpeakers'));
  }
}
