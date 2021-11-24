<?php

namespace App\Http\Controllers\Admin\Promo;

use App\Http\Controllers\Controller;
use App\Http\Models\Promo;
use Auth;

class GetAllPromoAction extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke()
    {
        if (!Auth::guard('admin')->user()) {
            return redirect('admin-tkmu/sign-in');
        }

        $allPromos = Promo::paginate(10);

        // dd($allPromos);

        $arrView = [
            'items' => $allPromos
        ];

        return view('pages.admin.promos.index', $arrView);
    }
}
