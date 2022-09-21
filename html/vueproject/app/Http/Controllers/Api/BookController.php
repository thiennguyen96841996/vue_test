<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreBookRequestApi;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $books = Book::all();
        return response()->json([
            'message' => 'ok',
            'data' => $books
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBookRequestApi  $request
     * @return JsonResponse
     */
    public function store(StoreBookRequestApi $request): JsonResponse
    {
        $book = new Book();
        $book = $book->storeBookData($request->all());

        return response()->json([
            'message' => 'Book created successfully',
            'data' => $book
        ], 201, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $book = Book::find($id);
        if ($book) {
            return response()->json([
                'message' => 'ok',
                'data' => $book
            ], 200, [], JSON_UNESCAPED_UNICODE);
        } else {
            return response()->json([
                'message' => 'Book not found',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreBookRequestApi  $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(StoreBookRequestApi $request, int $id): JsonResponse
    {
        $updateData = [
            'title' => $request->title,
            'author' => $request->author
        ];

        $book = Book::findOrFail($id);
        $book = $book->storeBookData($updateData);
        if ($book) {
            return response()->json([
                'message' => 'Book updated successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Book not found',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        if(Book::where('id', $id)->exists()) {
            $book = Book::findorFail($id);
            $book->delete();

            return response()->json([
                "message" => "Book deleted successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Book not found"
            ], 404);
        }
    }
}
