@extends('layouts.app')

@section('content')

<div class="jumbotron" style="display:flex;flex-wrap:wrap;background-color:white;margin: 30px 30px 30px 30px;margin-bottom: 0px;">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col p-3">
                <h1 style="font-size: 40px;">
                    Simple email validation
                    for everyone
                </h1>
                <p>
                    Remove fake emails and spam users from your email lists. Validate if an address is valid, and if it can receive email,<b> ⏱️ in under 0.5 seconds.</b>
                </p>
            </div>
            <div class="col p-3" style="border-style: solid; border-width: 1px;border-radius: 30px;margin:auto;width: 100%;padding-bottom: 50px;">
                <form method="POST" action="">
                    @csrf
                    <div class="row mb-3 ">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-5">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('check') }}
                            </button>
                        </div>
                    </div>
                </form>
                <br>
                <hr style="height:2px;border-width:0;color:gray;background-color:blue;">
                <div>
                    <h2 style="font-size:20px;">
                        This email address looks valid.
                    </h2>
                </div>
                <div class="row">
                    <div class="col">
                        <i class="fas fa-check"></i>
                        valid format
                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <div class="card card-body">
                            It appears to be formatted correctly and follows the structure of an email address.
                        </div>
                    </div>
                    </div>
                    <div class="col">
                        <i class="fas fa-check"></i>
                        No catch-all
                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <div class="card card-body">
                            It does not appear to be a catch-all address, where any user for this domain will accept email.
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <i class="fas fa-check"></i>
                        Domain
                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                        <div class="card card-body">
                            The domain of the email address is valid and has a valid DNS record
                        </div>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <i class="fas fa-check"></i>
                        Deliverable
                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <div class="card card-body">
                            The server of the email address has either it is either valid, or it is not possible to verify it but will accept emails.
                        </div>
                    </div>
                    </div>
                    <div class="col">
                        <i class="fas fa-check"></i>
                        Generic
                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <div class="card card-body">
                            The email address does not seem to be a generic email address, such as support@, info@, or contact@.
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <i class="fas fa-check"></i>
                        Blocklist free
                     <div class="collapse multi-collapse" id="multiCollapseExample2">
                            <div class="card card-body">
                             The email address is not blocklisted in our database of known spam email addresses.
                            </div>
                        </div>
                        </div>
                </div>
                <hr style="height:2px;border-width:0;color:gray;background-color:blue">
                <div class="row">
                    <div class="col-md-12">
                          <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Toggle details</button>
                    </div>
                </div>
                <br><br>
            </div>
            <div class="row">
                <div class="col p-3" style="text-align:center;letter-spacing: -2px;">
                    <h1 style="font-size: 30px;">
                        “Mail-verify delivers all we need in an email validation service: top,<br> security, scalability, performance, and extensive integrations”.
                    </h1>
                </div>
                <div class="container-fluid" style="text-align:center;font-weight:600;">
                    A happy customer, probably
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
