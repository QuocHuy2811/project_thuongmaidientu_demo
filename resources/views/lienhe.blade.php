@extends('layouts.app')

@section('title', 'Liên hệ')

@section('navTitle','Liên hệ')

@section('css')

@section('js')

@section('content')
    <div class="container mt-3 mb-3">
        <form>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputSDT" class="form-label">SDT</label>
            <input type="text" pattern="(0)[0-9]{9}" class="form-control" id="exampleInputSDT">
        </div>
        <div class="mb-3">
            <label for="exampleInputTieuDe" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" id="exampleInputTieuDe">
        </div>
        <div class="mb-3">
            <label for="exampleInputNoidung" class="form-label">Password</label>
            <input type="text" class="form-control" id="exampleInputNoidung">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
@endsection