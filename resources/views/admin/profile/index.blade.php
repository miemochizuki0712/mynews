@extends('layouts.profile')
@section('title', 'プロフィール情報')

@section('content')
  <div class="container">
    <div class="row">
      <h2>プロフィール情報</h2>
    </div>
    <div class="row">
      <div class="col-md-4">
          <a href="{{ route('admin.profile.add') }}" role="button" class="btn btn-primary">新規作成</a>
      </div>
    </div>
    <div class="row">
      <div class="list-news col-md-12 mx-auto">
        <div class="row">
          <table class="table table-dark">
            <thead>
              <tr>
                <th width="10%">氏名</th>
                <th width="20%">性別</th>
                <th width="30%">趣味</th>
                <th width="30%">自己紹介</th>
                <th width="10%">備考</th>
              </tr>
            </thead>
            <tbody>
              @foreach($posts as $profile)
                <tr>
                  <th>{{ $profile->name }}</th>
                  <th>{{ $profile->gender }}</th>
                  <td>{{ Str::limit($profile->hobby, 100) }}</td>
                  <td>{{ Str::limit($profile->introduction, 250) }}</td>
                  <td>
                    <div>
                      <a href="{{ route('admin.profile.edit', ['id' => $profile->id]) }}">編集</a>
                    </div>
                    <div>
                      <a href="{{ route('admin.profile.delete', ['id' => $profile->id]) }}">削除</a>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection