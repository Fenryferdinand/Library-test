<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(){
        $books = Book::paginate(10);
        $authors = Author::all();
        return view("pages.book",[
            'books'=> $books,
            'authors' => $authors
        ]);
    }

    public function createBook(Request $request){
        try{
            DB::beginTransaction();
            $book = New Book();
            $book->book_name = $request->book_name;
            $book->author_id = $request->author_id;
            $book->book_publisher = $request->book_publisher;
            $book->publish_year = $request->publish_year;
            $book->book_synopsis = $request->book_synopsis;
            $book->save();
            DB::commit();
            return back()->with('success', ("Book $request->book_name created successfully"));
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', sprintf("Book failed with message : %s (%s)", $ex->getMessage(), $ex->getCode()));
        }
    }

    public function updateBook(Request $request){
        try{
            DB::beginTransaction();

            $book = Book::where('id',$request->id)->first();
            $book->book_name = $request->book_name;
            $book->author_id = $request->author_id;
            $book->book_publisher = $request->book_publisher;
            $book->publish_year = $request->publish_year;
            $book->book_synopsis = $request->book_synopsis;
            $book->save();
            DB::commit();
            return back()->with('success', ("Book $request->book_name updated successfully"));
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', sprintf("Book failed with message : %s (%s)", $ex->getMessage(), $ex->getCode()));
        }
    }

    public function deleteBook(Request $request){
        try{
            DB::beginTransaction();
            $book = Book::where('id',$request->id)->first();
            $book_name = $book->book_name;
            $book->delete();
            DB::commit();
            return back()->with('success', ("Book $book_name deleted successfully"));
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', sprintf("Book failed with message : %s (%s)", $ex->getMessage(), $ex->getCode()));
        }

    }
}
