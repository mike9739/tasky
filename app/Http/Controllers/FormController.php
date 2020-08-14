<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeLeadPost;
use App\Lead;
use Illuminate\Http\Request;

class FormController extends Controller
{

    public function store(storeLeadPost $request)
    {
        return Lead::create($request -> validated());
    }

}
