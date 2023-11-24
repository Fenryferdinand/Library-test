<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{

    public function index(){
        $author = Author::paginate(10);

        return view("pages.author",[
            'authors'=> $author
        ]);
    }

    public function createAuthor(Request $request){
        try{
            DB::beginTransaction();
            $author = New Author();
            $author->author_name = $request->author_name;
            $author->author_nationality = $request->author_nationality;
            $author->author_desc = $request->author_desc;
            $author->save();
            DB::commit();
            return back()->with('success', ("Author $request->author_name created successfully"));
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', sprintf("Author failed with message : %s (%s)", $ex->getMessage(), $ex->getCode()));
        }
    }

    public function updateAuthor(Request $request){
        try{
            DB::beginTransaction();

            $author = Author::where('id',$request->id)->first();
            $author->author_name = $request->author_name;
            $author->author_nationality = $request->author_nationality;
            $author->author_desc = $request->author_desc;
            $author->save();
            DB::commit();
            return back()->with('success', ("Author $request->first_name updated successfully"));
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', sprintf("Author failed with message : %s (%s)", $ex->getMessage(), $ex->getCode()));
        }
    }

    public function deleteAuthor(Request $request){
        try{
            DB::beginTransaction();
            $author = Author::where('id',$request->id)->first();
            $author_name = $author->author_name;
            $author->delete();
            DB::commit();
            return back()->with('success', ("Author $author_name deleted successfully"));
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', sprintf("Author failed with message : %s (%s)", $ex->getMessage(), $ex->getCode()));
        }

    }
}
