<?php


namespace App\Http\Controllers\Delivery_partner;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class delivery_partnerController extends Controller
{
    public function index (){
        return view('Delivery_partner.dashboard');
    }
}
