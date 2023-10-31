@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    @forelse ($messages as $message)

                       <p> {{ $message->text }} </p>
                       <hr>

                    @empty
<p> There Is No Messages </p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
