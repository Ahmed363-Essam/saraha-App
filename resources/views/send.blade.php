@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (session()->has('success'))
                        <div class="alert alert-success"> {{ session()->get('success') }} </div>
                    @endif

                    @if (session()->has('danger'))
                    <div class="alert alert-danger"> {{ session()->get('danger') }} </div>
                @endif

                    <div class="card-header">Message To : {{ $user->name }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('Message.store', $user->id) }}">
                            <div class="mb-3">
                                @csrf
                                <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="6"
                                    placeholder="Type Your Message Here"></textarea>

                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div>


                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
