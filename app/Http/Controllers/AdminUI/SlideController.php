<?php

namespace App\Http\Controllers\AdminUI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function index(Request $request)
    {
        if (!session('admin_token')) return redirect()->route('admin.login');
        $resp = app(\App\Http\Controllers\Admin\SlideController::class)->index($request);
        $data = $resp instanceof \Illuminate\Http\JsonResponse ? $resp->getData(true)['data'] ?? [] : [];
        return view('admin.slides.index', ['slides' => $data]);
    }

    public function create(Request $request)
    {
        if (!session('admin_token')) return redirect()->route('admin.login');
        return view('admin.slides.create');
    }

    public function store(Request $request)
    {
        if (!session('admin_token')) return redirect()->route('admin.login');

        // convert to SlideRequest so Admin controller type-hint is satisfied
        $slideReq = \App\Http\Requests\SlideRequest::createFrom($request);
        $slideReq->setContainer(app());
        $slideReq->setRedirector(app('redirect'));
        // run validation lifecycle so SlideRequest has validator and validated() can be called
        $slideReq->validateResolved();

        app(\App\Http\Controllers\Admin\SlideController::class)->store($slideReq);
        return redirect()->route('admin.slides.index')->with('success','Slide created');
    }

    public function edit(Request $request, $id)
    {
        if (!session('admin_token')) return redirect()->route('admin.login');
        $resp = app(\App\Http\Controllers\Admin\SlideController::class)->show($id);
        $data = $resp instanceof \Illuminate\Http\JsonResponse ? $resp->getData(true)['data'] ?? [] : [];
        return view('admin.slides.edit', ['slide' => $data]);
    }

    public function update(Request $request, $id)
    {
        if (!session('admin_token')) return redirect()->route('admin.login');

        // convert Request to SlideRequest to satisfy type-hint and validation
        $slideReq = \App\Http\Requests\SlideRequest::createFrom($request);
        $slideReq->setContainer(app());
        $slideReq->setRedirector(app('redirect'));
        // run validation lifecycle so SlideRequest has validator and validated() can be called
        $slideReq->validateResolved();

        app(\App\Http\Controllers\Admin\SlideController::class)->update($slideReq, $id);
        return redirect()->route('admin.slides.index')->with('success','Slide updated');
    }

    public function toggle(Request $request, $id)
    {
        if (!session('admin_token')) return redirect()->route('admin.login');
        app(\App\Http\Controllers\Admin\SlideController::class)->toggle($id);
        return redirect()->route('admin.slides.index')->with('success','Slide toggled');
    }

    public function destroy(Request $request, $id)
    {
        if (!session('admin_token')) return redirect()->route('admin.login');
        app(\App\Http\Controllers\Admin\SlideController::class)->destroy($id);
        return redirect()->route('admin.slides.index')->with('success','Slide deleted');
    }
}
