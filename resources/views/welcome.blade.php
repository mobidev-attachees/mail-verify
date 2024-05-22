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
                <form method="POST" action="{{ route('validate.api.mail') }}" id="validateEmailViaApi">
                    @csrf
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <div class="col-md-5">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Check') }}
                            </button>
                        </div>
                    </div>
                </form>
                <div id="cf-response-message"></div>
                <div class="row">
                    <div class="col">
                        <i id="format-icon" class="fas"></i>
                        <span id="format-message"></span>
                        <div class="collapse multi-collapse" id="format-collapse">
                            <div class="card card-body" id="format-card"></div>
                        </div>
                    </div>
                    <div class="col">
                        <i id="domain-icon" class="fas"></i>
                        <span id="domain-message"></span>
                        <div class="collapse multi-collapse" id="domain-collapse">
                            <div class="card card-body" id="domain-card"></div>
                        </div>
                    </div>
                    <div class="col">
                        <i id="nogeneric-icon" class="fas"></i>
                        <span id="nogeneric-message"></span>
                        <div class="collapse multi-collapse" id="nogeneric-collapse">
                            <div class="card card-body" id="nogeneric-card"></div>
                        </div>
                    </div>
                    <div class="col">
                        <i id="noblock-icon" class="fas"></i>
                        <span id="noblock-message"></span>
                        <div class="collapse multi-collapse" id="noblock-collapse">
                            <div class="card card-body" id="noblock-card"></div>
                        </div>
                    </div>
                </div>
                <div id="cf-response-message"></div>


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


<script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("validateEmailViaApi").addEventListener("submit", function(event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch('{{ route('validate.api.mail') }}', {
            method: 'POST',
            body: formData,
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
        .then(response => {
            if (!response.ok) {
                return response.text().then(text => { throw new Error(text); });
            }
            return response.json();
        })
        .then(data => {
            if (data.validation) {
                const validation = data.validation;

                // Update Format section
                updateValidationSection("format", validation.format, "Valid format", "Invalid format", "It appears to be formatted correctly and follows the structure of an email address.", "The email address is not formatted correctly.");

                // Update Domain section
                updateValidationSection("domain", validation.domain, "Valid domain", "Invalid domain", "The domain of the email address is valid and has a valid DNS record.", "The domain of the email address is invalid or does not have a valid DNS record.");

                // Update No Generic section
                updateValidationSection("nogeneric", validation.nogeneric, "No Generic", "Generic", "The email address does not seem to be a generic email address, such as support@, info@, or contact@.", "The email address is from a generic domain.");

                // Update No Block section
                updateValidationSection("noblock", validation.noblock, "Not Blocked", "Blocked", "The email address is not blocklisted in our database of known spam email addresses.", "The email address is blocklisted.");

                // Show response message
                document.getElementById("cf-response-message").innerText = `Validation Results: ${validation.results}%`;

            } else {
                document.getElementById("cf-response-message").innerText = 'Validation data not found in the response.';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById("cf-response-message").innerText = 'An error occurred. Please try again later.';
        });
    });

    function updateValidationSection(section, isValid, validText, invalidText, validDesc, invalidDesc) {
        const icon = document.getElementById(`${section}-icon`);
        const message = document.getElementById(`${section}-message`);
        const card = document.getElementById(`${section}-card`);
        const collapse = $(`#${section}-collapse`);

        if (isValid) {
            icon.classList.add("fa-check");
            icon.classList.remove("fa-times");
            message.textContent = validText;
            card.textContent = validDesc;
        } else {
            icon.classList.add("fa-times");
            icon.classList.remove("fa-check");
            message.textContent = invalidText;
            card.textContent = invalidDesc;
        }

        collapse.collapse('show');
    }
});


</script>


@endsection
