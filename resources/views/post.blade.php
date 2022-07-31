@extends('layouts.app')
@section('content')
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
            @endauth
        </div>
        @endif
    </div>

    <div class="row justify-content-start">
        @if($post)
            <div class="col-10 m-auto" data-aos="fade-up">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $post->title }}</h4>
                        <h6 class="card-subtitle mb-2 text-muted">{{$post->created_at->format('j F, Y')}}</h6>
                        <p class="card-text">{{$post->content }}</p>
                        <a class="btn btn-primary mb-3" data-bs-toggle="collapse" href="#viewComment" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Voir les commentaires</a>
                        @forelse($post->comments as $comment)
                            <div class="row">
                                <div class="col">
                                    <div class="collapse multi-collapse" id="viewComment">
                                        <div class="card card-body">
                                            {{$comment->content}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="row">
                                <div class="col">
                                    <div class="collapse multi-collapse" id="viewComment">
                                        <div class="card card-body">
                                            <p>Il n'y a pas de commentaires</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        @else
            <p>Cette article est indisponible</p>
        @endif
    </div>

@endsection