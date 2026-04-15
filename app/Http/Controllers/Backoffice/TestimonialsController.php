<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TestimonialsController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(20);

        return view('backoffice.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('backoffice.testimonials.create', ['testimonial' => new Testimonial()]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['status'] = $request->boolean('status', true);

        Testimonial::create($data);
        Cache::flush();

        return redirect()->route('backoffice.testimonials.index')->with('success', 'Depoimento criado com sucesso.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('backoffice.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $this->validateData($request);
        $data['status'] = $request->boolean('status');

        $testimonial->update($data);
        Cache::flush();

        return redirect()->route('backoffice.testimonials.index')->with('success', 'Depoimento atualizado com sucesso.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        Cache::flush();

        return redirect()->route('backoffice.testimonials.index')->with('success', 'Depoimento removido com sucesso.');
    }

    protected function validateData(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
        ]);
    }
}
