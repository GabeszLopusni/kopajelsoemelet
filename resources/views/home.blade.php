@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class = "col-md-3 col-md-offset 0">
        <div class = "panel panel-default">
          <div class = "panel-heading">Hi there, {{ Auth::user()->name }}</div>
          <img width = "100%" height = "35%" src = ""/>
          <p align = "center"><a href="#">Change profile picture</a></p>
          <p style = "padding-left: 5px"><br/><b> Your data:</b>
          <p style = "padding-left: 10px">E-mail address:</p>
          <p style = "padding-left: 15px"> {{ Auth::user()->email }}</p>
          <p style = "padding-left: 10px"> Country: </p>
          <p style = "padding-left: 15px"> {{ Auth::user()->country }} </p>
          <p style = "padding-left: 10px"> Date of birth: </p>
          <p style = "padding-left: 15px"> {{ Auth::user()->date_of_birth }} </p>
          <p align = "center"><a id = "editProfile" href="#">Edit profile</a></p>
          </p>
        </div>
      </div>
        <div class="col-md-8 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                      <section class = "row new-post">
                        <div class = "col-md-6 col-md-offset-0">
                          <header><h3>Post something</h3></header>
                          <form action = "{{ route('post.create') }}" method = "post">
                            <div class = "form-group">
                              <textarea class = "form-control" name = "body" rows = "5" placeholder="Say something.."></textarea>
                              <input type = "hidden" value = "{{ Session::token() }}" name = "_token">
                            </div>
                              <button type = "submit" class = "btn btn-primary">Send post</button>
                          </form>
                        </div>
                      </section>

                      <section>
                        <div class = "col-md-6-md-3-offset">
                          <header><h3>Newsfeed</h3></header>
                            <hr/>
                          @foreach($posts as $post)
                            <article class = "post" data-postid = "{{ $post->id }}">
                              <p>{{ $post->body }}</p>
                              <div class = "info">
                                  Posted by <b>{{ $post->user->name }}</b> on <b>{{ $post->created_at}}</b>
                              </div>
                              <div class = "interaction">
                        <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a> |
                        <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike' : 'Dislike'  }}</a>
                        @if ($post->user_id == Auth::user()->id)
                                  |
                                  <a class = "edit" href = "#">Edit</a> |
                                  <a href = "{{ route('post.delete', ['post_id' => $post->id]) }}">Delete</a>
                                @endif
                              </div>
                            </article>
                            <hr/>
                          @endforeach
                        </div>
                      </section>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  var token = '{{ Session::token() }}';
  var url = '{{ route('edit') }}';
  var url_prof = '{{ route('editProfile') }}';
  var user_id = '{{ Auth::user()->id }}';
</script>

@endsection

<div class = "modal fade" tabindex = "-1" role = "dialog" id="edit-modal">
  <div class = "modal-dialog">
    <div class = "modal-content">
      <div class = "modal-header">
        <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
        <h4 class = "modal-title">Edit Post</h4>
      </div>
      <div class = "modal-body">
        <div class = "form-group">
          <label for = "post-body">Edit post</label>
          <textarea class = "form-control" name = "post-body" id = "post-body" rows = "5"></textarea>
        </div>
      </div>
      <div class = "modal-footer">
        <button type = "button" class = "btn btn-default" data-dismiss = "modal">Close</button>
        <button type = "button" class = "btn btn-primary" id = "modal-save-post">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class = "modal fade" tabindex = "-1" role = "dialog" id="edit-modal-profile">
  <div class = "modal-dialog">
    <div class = "modal-content">
      <div class = "modal-header">
        <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
        <h4 class = "modal-title">Edit Profile</h4>
      </div>
      <div class = "modal-body">
        <div class = "form-group">
          <label for = "email">E-mail</label>
          <input class = "form-control" name = "email" id = "email" rows = "1"/>
          <label for = "born">Date of Birth</label>
          <input class = "form-control" name = "born" id = "born" rows = "1"/>
          <label for = "country">Country</label>
          <input class = "form-control" name = "country" id = "country" rows = "1"/>
        </div>
      </div>
      <div class = "modal-footer">
        <button type = "button" class = "btn btn-default" data-dismiss = "modal">Close</button>
        <button type = "button" class = "btn btn-primary" id = "modal-save-profile">Save changes</button>
      </div>
    </div>
  </div>
</div>
   <script>
       
        var token = '{{ Session::token() }}';
        var urlEdit = '{{ route('edit') }}';
        var urlLike = '{{ route('like') }}';

    </script>
