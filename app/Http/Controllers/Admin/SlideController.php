<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Http\Requests\SlideRequest;
use App\Http\Resources\SlideResource;
use Illuminate\Support\Str;

class SlideController extends Controller
{
    public function index(Request $request)
    {
        $slides = Slide::orderBy('order')->paginate(20);
        return response()->json(['success' => true, 'message' => 'Slides list', 'data' => SlideResource::collection($slides), 'meta' => ['pagination' => $slides->toArray()]]);
    }

    public function store(SlideRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('slides', $filename, 'public');
            $data['image'] = $filename;
        }
        $slide = Slide::create($data);
        return response()->json(['success' => true, 'message' => 'Slide created', 'data' => new SlideResource($slide)]);
    }

    public function show($id)
    {
        $s = Slide::findOrFail($id);
        return response()->json(['success' => true, 'message' => 'Slide detail', 'data' => new SlideResource($s)]);
    }

    public function update(SlideRequest $request, $id)
    {
        $s = Slide::findOrFail($id);
        $data = $request->validated();
        if ($request->hasFile('image')) {
            // delete old file
            if ($s->image && \Storage::disk('public')->exists('slides/'.$s->image)) {
                \Storage::disk('public')->delete('slides/'.$s->image);
            }
            $file = $request->file('image');
            $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('slides', $filename, 'public');
            $data['image'] = $filename;
        }
        $s->update($data);
        return response()->json(['success' => true, 'message' => 'Slide updated', 'data' => new SlideResource($s->fresh())]);
    }

    public function destroy($id)
    {
        $s = Slide::findOrFail($id);
        if ($s->image && \Storage::disk('public')->exists('slides/'.$s->image)) {
            \Storage::disk('public')->delete('slides/'.$s->image);
        }
        $s->delete();
        return response()->json(['success' => true, 'message' => 'Slide deleted']);
    }

    public function toggle($id)
    {
        $s = Slide::findOrFail($id);
        $s->is_active = !$s->is_active;
        $s->save();
        return response()->json(['success' => true, 'message' => 'Slide toggled', 'data' => new SlideResource($s->fresh())]);
    }
}
