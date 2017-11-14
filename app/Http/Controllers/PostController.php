<?php
namespace App\Http\Controllers;

use App\Model\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Like;

class PostController extends Controller
{
  public function index()
  {
      $posts = Post::orderBy('id', 'DESC')->get();
      return view('home', ['posts' => $posts]);
  }

  public function postCreatePost(Request $request)
  {
    // Validation
    $this->validate($request, [
      'body' => 'required|max:2000'
    ]);

    $post = new Post();
    $post->body = $request['body'];
    $post->user_id = Auth::user()->id;
    $message = "Error processing request";
    if ($request->user()->posts()->save($post))
    {
      $message = "Post successfully created";
    }
    return redirect()->route('home')->with(['message' => $message]);
  }

  public function getDeletePost($post_id)
  {
    $post = Post::where('id', $post_id)->first();
    $post->delete();
    return redirect()->route('home');
  }

  public function postEditPost(Request $request)
  {
    $this->validate($request, [
      'body' => 'required'
    ]);
    $post = Post::find($request['postId']);
    $post->body = $request['body'];
    $post->update();

    //return redirect()->route('home');
    return response()->json(['message' => 'Post edited'], 200);
  }
  
  public function postLikePost(Request $request)
  {
      $post_id = $request['postId'];
      $is_like = $request['isLike'] === 'true';
      $update = false;
      $post = Post::find($post_id);
      if (!$post) {
          return null;
      }
      $user = Auth::user();
      $like = $user->likes()->where('post_id', $post_id)->first();
      if ($like) {
          $already_like = $like->like;
          $update = true;
          if ($already_like == $is_like) {
              $like->delete();
              return null;
          }
      } else {
          $like = new Like();
      }
      $like->like = $is_like;
      $like->user_id = $user->id;
      $like->post_id = $post->id;
      if ($update) {
          $like->update();
      } else {
          $like->save();
      }
      return null;
  }

}
