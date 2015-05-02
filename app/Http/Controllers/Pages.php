<?php namespace App\Http\Controllers;

use Illuminate\Http\Response;

class Pages extends Controller {

    /**
     * Show the homepage.
     *
     * @return Response
     */
    public function home()
    {
        return view('home');
    }

}
