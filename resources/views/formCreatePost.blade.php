<!-- path for many view -->
@extends('layouts.app')

<!-- section for contains the content -->
@section('content')
<div class="container mt-5">
    <h1 class="mb-5">formulaire new post</h1>
<div class="row justify-content-center">
    <div class="col-md-8">
        @if (isset($post))
            <!-- Le formulaire est géré par la route "update.posts" -->
            <form method="post" action="{{route('update.post', $post->id)}}">
            @method('PUT')
        @else
            <!-- Le formulaire est géré par la route "posts.store" -->
            <form method="post" action="{{route('post.store')}}">
        @endif
            @csrf
            <div class="form-group">
              <label for="exampleTitle" class="mb-2">Titre</label>
              <input name="title" @error('title') is-invalid @enderror type="text" value="{{ isset($post->title) ? $post->title : old('title') }}" class="form-control" id="exampleTitle" placeholder="Entrer votre titre">
                @error('title')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="exampleText" class="mb-2">Contenu</label>
                <textarea @error('content') is-invalid @enderror name="content" id="" class="form-control" cols="30" placeholder="Blablabla" rows="10">{{ isset($post->content) ? $post->content : old('content') }}</textarea>
                @error('content')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-outline-dark mt-3">Valider</button>
        </form>
    </div>
</div>
</div>

@endsection