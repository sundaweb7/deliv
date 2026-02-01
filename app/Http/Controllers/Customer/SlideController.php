<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Http\Resources\SlideResource;

class SlideController extends Controller
{
    public function index(Request $request)
    {
        $slides = Slide::where('is_active', true)->orderBy('order')->get();
        return response()->json(['success' => true, 'message' => 'Slides', 'data' => SlideResource::collection($slides)]);
    }
}
