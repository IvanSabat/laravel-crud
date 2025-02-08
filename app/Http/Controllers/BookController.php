<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\JsonResponse;

class BookController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $books = Book::query()->latest()->paginate(25);

        return $this->sendResponse(BookResource::collection($books), 'Books retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request): JsonResponse
    {
        $payload = $request->validated();
        $book = Book::query()->create($payload);

        return $this->sendResponse(new BookResource($book), 'Book created successfully.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $book = Book::query()->find($id);

        if (is_null($book)) {
            return $this->sendError('Book not found.');
        }

        return $this->sendResponse(new BookResource($book), 'Book retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book): JsonResponse
    {
        $payload = $request->validated();
        $book->update($payload);

        return $this->sendResponse(new BookResource($book), 'Book updated successfully.', 202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $book = Book::query()->find($id);
        $book?->delete();

        return $this->sendResponse([], 'Book deleted successfully.', 204);
    }
}
