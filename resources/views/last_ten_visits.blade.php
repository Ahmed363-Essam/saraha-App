@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} - num of visists {{ $visitsNo }} </div>

                <div class="card-body">

                    @forelse ($visits as $visit)

                    <p> {{ $visit->created_at->diffForHumans() }} </p>
                    <hr>

                    @empty
                    <p> There Is No Visits </p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
