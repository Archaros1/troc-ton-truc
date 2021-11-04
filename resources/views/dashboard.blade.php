@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <p>Bonjour {{ $user->name }}</p>
        </div>
        <div class="row">
            <div class="col">
                <a href="{{ route('offer.make') }}" class="btn btn-primary">{{ __('offer.make') }}</a>
                <a href="" class="btn btn-success">{{ __('offer.search') }}</a>
            </div>
        </div>
        <div class="row mt-3 ">
                @foreach ($items as $item)
                <div class="card mt-2 ml-2 overflow-hidden" style="width: 18rem;">
                    <div class="h-50 overflow-hidden">
                        <img src="{{ $item->pictures[0]->url }}" class=" w-100" style="object-fit: cover;width:18rem;height:18rem;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">{{ $item->description->text }}</p>
                        <a href="#" class="btn btn-primary">{{ __('offer.details') }}</a>
                    </div>
                </div>

            @endforeach

        </div>
    </div>
@endsection
