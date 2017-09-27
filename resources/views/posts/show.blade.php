@extends('layout')

@section('content')

    <div class="col-sm-8">
        <h1>{{ $post->title }}</h1>

        <p>{{ $post->body }}</p>

        <div class="comments">
            <div class="list-group">
                @foreach($post->comments as $comment)
                    <li class="list-group-item">
                        {{ $comment->created_at->diffForHumans() }}: &nbsp;
                        {{ $comment->body }}
                    </li>
                @endforeach

                <div class="list-group-item">
                    <form method="POST" action="/posts/{{$post->id}}/comments">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" class="form-control" id="body" name="body" placeholder="Your Comment here" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Comment</button>
                        </div>
                        @include('includes.errors')
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection