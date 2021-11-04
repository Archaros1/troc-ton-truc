@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('offer.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Nom</label>
                <input type="text" name="name" id="description" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="description" >Description</label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="pic">Photos</label>
                <input type="file" name="pic" id="pic">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
