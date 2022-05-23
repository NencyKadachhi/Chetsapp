@extends('layouts.app')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form method="POST" action="{{ route('user-store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">USERNAME</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">EMAIL</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">PASSWORD</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">ADDRESS</label>
        <input type="text" class="form-control" name="address">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">CITY</label>
        <input type="text" class="form-control" name="city">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">COUNTRY</label>
        <input type="text" class="form-control" name="country">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">UPLOAD IMAGE</label>
        <input type="file" class="form-control" name="image">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@push('script')
@endpush
