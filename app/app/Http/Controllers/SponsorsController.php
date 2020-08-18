<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sponsor;

class SponsorsController extends Controller
{
    public function partners()
    {
        // if (!request()->expectsJson()) {
        //     return view('partners');
        // }

        $partners = Sponsor::paginate(12);

        return response()->json(['partners' => $partners]);
    }
}
