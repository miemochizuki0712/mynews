@extends('layouts.profile')
@section('title', 'プロフィール')


@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>プロフィール編集</h2>
        <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
          @if (count($errors) > 0)
            <ul>
              @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
              @endforeach
            </ul>
          @endif
          {{--氏名(name)--}}
          <div class="form-group row">
            <label class="col-md-2" for="name">氏名</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="name" value="{{ $profile_form->name }}">
            </div>
          </div>
          {{--性別(gender)--}}
          <div class="form-group row">
            <label class="col-md-2" for="gender">性別</label>
            <div class="col-md-10">
              <select class="form-control" name="gender"{{ $profile_form->gender }}>
                <option value="男性">男性</option>
                <option value="女性">女性</option>
              </select>
            </div>
          </div>
          {{--趣味(hobby)--}}
          <div class="form-group row">
            <label class="col-md-2" for="hobby">趣味</label>
            <div class="col-md-10">
              <textarea class="form-control" name="hobby" rows="5">{{ $profile_form->hobby }}</textarea>
            </div>
          </div>
          
          {{--自己紹介欄(introduction--}}
          <div class="form-group row">
            <label class="col-md-2" for="introduction">自己紹介</label>
            <div class="col-md-10">
              <textarea class="form-control" name="introduction" rows="10">{{ $profile_form->introduction }}</textarea>
            </div>
          </div>
          
          <div class="form-group row">
            <div class="col-md-10">
              <input type="hidden" name="id" value="{{ $profile_form->id }}">
              @csrf
              <input type="submit" class="btn btn-primary" value="更新">
            </div>
          </div>
        </form>
        <div class="row mt-5">
          <div class="col-md-4 mx-auto">
            <h2>編集履歴</h2>
            <ul class="list-group">
              @if ($profile_form->profile_histories != NULL)
                @foreach ($profile_form->profile_histories as $profile_history)
                  <li class="list-group-item">{{ $profile_history->edited_at }}</li>
                @endforeach
              @endif
            </ul>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection