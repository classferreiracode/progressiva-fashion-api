<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FaqsController extends Controller
{
    public function index()
    {
        $faqs = Faq::latest()->paginate(20);

        return view('backoffice.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('backoffice.faqs.create', ['faq' => new Faq()]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['status'] = $request->boolean('status', true);

        Faq::create($data);
        Cache::flush();

        return redirect()->route('backoffice.faqs.index')->with('success', 'FAQ criado com sucesso.');
    }

    public function edit(Faq $faq)
    {
        return view('backoffice.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $data = $this->validateData($request);
        $data['status'] = $request->boolean('status');

        $faq->update($data);
        Cache::flush();

        return redirect()->route('backoffice.faqs.index')->with('success', 'FAQ atualizado com sucesso.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        Cache::flush();

        return redirect()->route('backoffice.faqs.index')->with('success', 'FAQ removido com sucesso.');
    }

    protected function validateData(Request $request): array
    {
        return $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string', 'max:255'],
        ]);
    }
}
