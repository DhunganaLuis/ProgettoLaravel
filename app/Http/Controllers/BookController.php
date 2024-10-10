<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('id','asc')->get();
        return view('index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors= Author::orderBy('name','asc')->get();
        $categories= Category::orderBy('name','asc')->get();
        return view('book.create-book',compact('authors','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $image = Image::make($file)->resize(400, 520);
            $image->save(public_path('cover/' . $fileName));
            $imagePath = 'cover/' . $fileName;
        } else {
            $imagePath = 'cover/default.png';
        }
        $validatedData = $request->validated();
        $validatedData['cover_image'] = $imagePath;

        Book::create($validatedData);

        return redirect()->route('book.index')->with('status', 'Book added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('book.detail-book',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors=Author::orderBy('name','asc')->get();
        $categories= Category::orderBy('name','asc')->get();
        return view('book.edit-book',compact('book','authors','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $imagePath = $book->cover_image;

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $image = Image::make($file)->resize(400, 520);
            $image->save(public_path('cover/' . $fileName));

            $imagePath = 'cover/' . $fileName;

            if ($book->cover_image && $book->cover_image !== 'cover/default.png') {
                File::delete(public_path($book->cover_image));
            }
        }

        $validatedData = $request->validated();
        $validatedData['cover_image'] = $imagePath;
        $book->update($validatedData);
        return redirect()->route('book.index')->with('status', 'Book updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index');
    }
}
