@extends('layouts.base')

@section('content')
{{-- <section class="gradient-form"> --}}
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center flex-column">
            <div class="col-md-12 p-0">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="container">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <h5 class="mt-1 mb-5 pb-1">
                                            <i class="fa-solid fa-store" style="color: red;"></i> <b> SIMS Web App </b>
                                        </h5>
                                    </div>
                                    <form class="row" method="post" action="{{ route('login.perform') }}">
                                        @csrf
                                        <div class="row justify-content-md-center">
                                            <div class="col-8">
                                                <h2 style="text-align: center"><b>Masuk atau buat akun untuk memulai</b></h2>
                                            </div>
                                        </div>

                                        <div class="form-outline mb-5 mt-5">
                                            <div class="input-group">
                                                <div class="input-group-text">@</div>
                                                <input id="email" type="name" class="form-control py-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="masukan email anda" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-outline mb-5">
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
                                                <input id="password" type="password" class="form-control py-3 @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" autocomplete="password" placeholder="masukan password anda" autofocus>

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="col-12 btn btn-primary btn-block" style="background-color: #F42619;" type="submit">
                                                Masuk
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2" style="background-position: center; background-image: url({{ asset('assets/Frame_98699.png') }});">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- </section> --}}

@endsection
