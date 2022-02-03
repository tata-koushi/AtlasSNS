@extends('layouts.login')

@section('content')
<form class="mb-2 mt-4 text-center" method="get" action="{{ route('/search') }}">
  <input class="form-control my-2 mr-5" type="search" placeholder="ユーザー名" name="search" value="@if (isset($search)) {{ $search }} @endif">
  <div class="d-flex justify-content-center">
    <button class="btn btn-info my-2" type="submit">検索</button>
  </div>
</form>


@endsection
