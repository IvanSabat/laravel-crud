<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StepController extends Controller
{
    public function index(): View
    {
        $books = Book::all();

        return view('step.index', compact('books'));
    }

    public function createStepOne(Request $request): View
    {
        $book = $request->session()->get('book');

        return view('step.create-step-one', compact('book'));
    }

    public function postCreateStepOne(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name'        => ['required', 'string', 'min:1', 'max:254'],
            'author'      => ['required', 'string', 'min:1', 'max:254'],
            'description' => ['required', 'string', 'min:1', 'max:254'],
        ]);

        if (empty($request->session()->get('book'))) {
            $book = new Book();
        } else {
            $book = $request->session()->get('book');
        }
        $book->fill($validatedData);
        $request->session()->put('book', $book);

        return redirect()->route('step.create.step.two');
    }

    public function createStepTwo(Request $request): View
    {
        $book = $request->session()->get('book');

        return view('step.create-step-two', compact('book'));
    }

    public function postCreateStepTwo(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'genre' => ['required'],
            'year_of_publication' => ['required', 'numeric', 'min:1400', 'max:'.date('Y')],
        ]);

        $book = $request->session()->get('book');
        $book->fill($validatedData);
        $request->session()->put('book', $book);

        return redirect()->route('step.create.step.three');
    }

    public function createStepThree(Request $request): View
    {
        $book = $request->session()->get('book');

        return view('step.create-step-three', compact('book'));
    }

    public function postCreateStepThree(Request $request): RedirectResponse
    {
        $book = $request->session()->get('book');
        $book->save();

        $request->session()->forget('book');

        return redirect()->route('get-books');
    }
}
