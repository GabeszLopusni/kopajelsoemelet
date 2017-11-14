<?php
namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class ProfilePictureController extends Controller
{
  public function getProfilePicture()
  {
    return Profile_Picture::where('user_id', Auth::user()->id)->first();
  }
}
