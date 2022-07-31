@extends('layouts.app')
@section('content')
    <section class="header">
        @if ($message = Session::get('success'))
            <div class="alert alert-primary mt-1 mb-1">{{ $message }}</div>
        @endif
        <div class="row align-items-center bg-img-fixed">
            <span></span>
            <div class="container titleHeader">
                <h1 class="text-white mb-0 text-center">Contactez nous</h1>
            </div>
        </div>
    </section>
    <div class="container mt-5">
        <div class="row g-3">
            <div class="col-lg-4">
                <div class="d-flex" data-show="startbox">
                    <div class="flex-grow-1">
                        <h5 class="m-0">Contact</h5>
                        <p class="m-0 mt-15">
                            <a href="mailto:info@trefous.com" class=" text-decoration-none">Email : test@test@gmail.com</a>
                        </p>
                        <p class="m-0 mt-15">
                            <a href="tel:06 06 06 06 06"  class=" text-decoration-none">Téléphone : +33 06 06 06 06 06</a>
                        </p>
                    </div>
                </div>
                <div class="d-flex mt-5" data-show="startbox" data-show-delay="100">
                    <div class="flex-grow-1">
                        <h5 class="m-0">Addresse :</h5>
                        <p class="m-0 mt-15">12 rue des champs, <br>Tours 37000 FRANCE</p>
                    </div>
                </div>
                <div class="d-flex mt-5" data-show="startbox" data-show-delay="200">
                    <div class="flex-grow-1">
                        <h5 class="m-0">Heures d'ouverture :</h5>
                        <p class="m-0 mt-15">Lundi au Vendredi <br>10:00 - 18:00</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8" data-show="startbox" data-show-delay="300">
                <!-- Form-->
                <form method="post" action="{{route('send.contact')}}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <input @error('name') is-invalid @enderror class="form-control formContact" type="text" placeholder="Votre nom *" name="name">
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6">
                            <input @error('email') is-invalid @enderror class="form-control formContact" type="email" placeholder="Votre Email *" name="email">
                            @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6">
                            <input @error('phone') is-invalid @enderror class="form-control formContact" type="tel" placeholder="Votre téléphone *" name="phone">
                            @error('phone')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6">
                            <select class="form-control form-select formContact" @error('objet') is-invalid @enderror name="objet">
                                @if($options)
                                    @foreach($options as $option)    
                                        <option value="{{ $option }}">{{ $option }}</option>
                                    @endforeach
                                @endif
                                {{-- <option selected="">Objet</option>
                                <option>Demande de renseignements</option>
                                <option>Candidature</option>
                                <option>Demande de stage</option>
                                <option>Demande de partenariat</option> --}}
                            </select>
                            @error('objet')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 mb-10">
                            <textarea @error('content') is-invalid @enderror class="form-control formContact" rows="2" placeholder="Message *" name="content"></textarea>
                            @error('content')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="personalData" required>
                                <label class="form-check-label" for="personalData">J'accepte les conditions générales d'utilisation</label>
                            </div>
                        </div>
                        <div class="col-12 text-end">
                            <button class="btn btn-outline-dark" type="submit">Envoyé</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>  
    <section class="map mt-5">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62863.49352339821!2d0.606602261964117!3d47.36842535768929!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47fcd5b34a979a55%3A0x40dc8d705388430!2sTours!5e0!3m2!1sfr!2sfr!4v1657280844421!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
@endsection