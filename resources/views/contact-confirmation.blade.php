@extends('layouts.app')

@section('title', 'Message Sent')

@section('content')
<section class="py-5">
    <div class="container px-5">
        <div class="bg-light rounded-4 py-5 px-4 px-md-5">
            <div class="text-center mb-5">
                <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-check-circle"></i></div>
                <h1 class="fw-bolder">Thank You!</h1>
                <p class="lead fw-normal text-muted mb-0">Your message has been received.</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="card shadow-sm border-0 rounded-4">
                        <div class="card-body p-4">
                            <h5 class="card-title text-center mb-4">Here is the information you submitted:</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Name:</strong> {{ $data['name'] ?? 'N/A' }}</li>
                                <li class="list-group-item"><strong>Email:</strong> {{ $data['email'] ?? 'N/A' }}</li>
                                <li class="list-group-item"><strong>Phone:</strong> {{ $data['phone'] ?? 'N/A' }}</li>
                                <li class="list-group-item"><strong>Message:</strong><br>{{ $data['message'] ?? 'N/A' }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('home') }}" class="btn btn-outline-primary">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
