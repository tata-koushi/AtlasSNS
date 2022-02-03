@extends('layouts.login')

@section('content')
<div class="container">
  <div class="form-group">
    <form action="{{ route('posts.create') }}" method="get" class="form-horizontal">
      <!-- 投稿の本文 -->
      <input type="text" name="post" placeholder="投稿内容を入力してください">
      <input type="hidden" name="user_id">
      <!--　投稿ボタン -->
      <div class="">
        <button type="submit" class="btn btn-success pull-right">投稿</button>
      </div>
    </form>
  </div>
</div>
@endsection
