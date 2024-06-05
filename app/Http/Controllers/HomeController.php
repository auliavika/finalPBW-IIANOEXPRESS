<?php
  
namespace App\Http\Controllers;
  

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
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
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        return view('home');
    } 
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {
        return view('adminHome');
    }
  
    public function totalPendapatan()
    {
        // Calculate the total revenue from verified tickets
        $totalPendapatan = Ticket::where('status', 'Sudah Bayar')->sum('total_price');

        return view('adminHome', compact('totalPendapatan'));
    }

}