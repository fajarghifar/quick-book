<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function show(Activity $activity)
    {
        return view('companies.activities.show', compact('activity'));
    }
}
