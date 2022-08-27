<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
 
class PostController extends Controller
{
    public function index(Request $request)
    {
      $post = Post::get();
      if ($request->has('view_deleted')) {
           $post = Post::onlyTrashed()->get();
      }
      return view('delete.record',compact('post'));
    }
    public function delete($id)
    {
      Post::find($id)->delete();
      return back()->with('success','Record Deleted successfully');
    }

    public function restore($id)
    {
       Post::withTrashed()->find($id)->restore();
       return back()->with('success','Record Restored successfully');
    }
    public function restore_all()
    {
       Post::onlyTrashed()->restore();
       return back()->with('success','All Record Restored successfully');
    }

}

