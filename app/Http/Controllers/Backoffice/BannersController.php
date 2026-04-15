<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BannersController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->paginate(20);

        return view('backoffice.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('backoffice.banners.create', ['banner' => new Banner()]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['status'] = $request->boolean('status', true);

        Banner::create($data);
        Cache::flush();

        return redirect()->route('backoffice.banners.index')->with('success', 'Banner criado com sucesso.');
    }

    public function edit(Banner $banner)
    {
        return view('backoffice.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $data = $this->validateData($request);
        $data['status'] = $request->boolean('status');

        $banner->update($data);
        Cache::flush();

        return redirect()->route('backoffice.banners.index')->with('success', 'Banner atualizado com sucesso.');
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        Cache::flush();

        return redirect()->route('backoffice.banners.index')->with('success', 'Banner removido com sucesso.');
    }

    protected function validateData(Request $request): array
    {
        return $request->validate([
            'image' => ['required', 'string', 'max:255'],
            'link' => ['nullable', 'string', 'max:255'],
            'alt_text' => ['nullable', 'string', 'max:255'],
        ]);
    }
}
