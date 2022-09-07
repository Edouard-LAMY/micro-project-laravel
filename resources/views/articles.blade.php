<!-- path for many view -->
@extends('layouts.app')

<!-- section for contains the content -->
@section('content')
<div class="container mt-5">
    @if ($message = Session::get('success'))
    <div class="alert alert-primary mt-1 mb-1">{{ $message }}</div>
    @endif
    <h1 class="mb-3">Liste d'articles</h1>
    <div class="row mb-3">
        <form action="{{route('post.search')}}">
            <div class="col-3">
                <input type="date" name="searchDate" class="form-control">
            </div>
            <div class="col-3">
                <input type="date" name="searchDate2" class="form-control">
            </div>
            <button class="btn btn-dark mb-2 mt-2" type="submit">Valider</button>
        </form>
    </div>
    <div class="row justify-content-start">
        @if($posts->count() > 0)
            @foreach($posts as $post)
                <div class="col-4 mb-3" data-aos="fade-up">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ Str::limit($post->title, 20) }}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">{{$post->created_at->format('j F, Y')}}</h6>
                            <p class="card-text">{{ Str::limit($post->content, 50) }}</p>
                            <a href="{{ route('post.show', ['id' => $post->id])}}" class="card-link">Voir l'article</a>
                            <a href="{{ route('edit.post', $post->id)}}" class="card-link text-dark" value="modifier" id="linkEditPost"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{ route('delete.post', $post->id)}}" class="card-link text-danger" id="linkDeletePost" value="supprimer"><i class="fa-solid fa-trash-can"></i></a>
                            <form id="deletePost" action="{{ route('delete.post', $post->id)}}" method="post" style="display: none;">
                                @method('DELETE')
                                @csrf
                           </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>Aucun articles disponible</p>
        @endif
    </div>
</div>

@endsection