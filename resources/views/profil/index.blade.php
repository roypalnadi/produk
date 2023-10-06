@extends('layouts.app')

@section('content')
<div class="row pb-3">
    <div class="col-3">
        <img src="{{ asset('assets/Frame_98700.png') }}" alt="">
        <h3 class="mt-3 fw-bold" for="">Roy Palnadi Pebruar</h3>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="form-outline">
            <div class="input-group">
                <div class="input-group-text">@</div>
                <input id="username" type="name" class="form-control py-3 fw-bold" readonly value="revannaldi45@gmail.com" autofocus>

                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="form-outline">
            <div class="input-group">
                <div class="input-group-text"><i class="fa-solid fa-code"></i></div>
                <input id="password" type="name" class="form-control py-3 fw-bold" readonly value="Website Programmer" autocomplete="password" autofocus>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>
@endsection
