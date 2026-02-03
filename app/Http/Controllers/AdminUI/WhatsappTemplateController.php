<?php

namespace App\Http\Controllers\AdminUI;

use App\Http\Controllers\AdminUI\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\WhatsappTemplate;

class WhatsappTemplateController extends AdminBaseController
{
    public function index()
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $templates = WhatsappTemplate::orderBy('key')->orderBy('locale')->get();
        return view('admin.whatsapp_templates.index', ['templates' => $templates]);
    }

    public function edit($id)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $tpl = WhatsappTemplate::findOrFail($id);
        return view('admin.whatsapp_templates.edit', ['tpl' => $tpl]);
    }

    public function update(Request $request, $id)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $tpl = WhatsappTemplate::findOrFail($id);
        $data = $request->validate(['body' => 'required|string']);
        $tpl->update(['body' => $data['body']]);
        return redirect()->route('admin.whatsapp-templates.index')->with('success','Template updated');
    }
}
