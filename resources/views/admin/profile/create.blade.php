{{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')


{{-- profile.blade.phpの@yield('title')に'My プロフィール'を埋め込む --}}
@section('title', 'My プロフィール')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>My プロフィール</h2>
                
    <form action="{{ route('admin.profile.create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                
        <div class="form-group row">
            <label class="col-md-2">氏名</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
              </div>
        </div>
        
        <div class="form-group row">
            <label class="col-md-2">性別</label>
               <div class="col-md-10">
                 <select class="form-control" name="gender" value="{{ old('gender') }}">
                  <option value="未選択">選択してください</option>
                  <option value="男性">男性</option>
                  <option value="女性">女性</option>
                 </select>
        　　　</div>
        </div>
        
        <div class="form-group row">
            <label class="col-md-2">趣味</label>
               <div class="col-md-10">
                 <textarea class="form-control" name ="hobby" rows="5">{{ old('hobby') }}</textarea>
                </div>
        </div>
        
        <div class="form-group row">
            <label class="col-md-2">自己紹介欄</label>
               <div class="col-md-10">
                 <textarea class="form-control" name ="introduction" rows="10">{{ old('introduction') }}</textarea>
                </div>
        </div>
        
         <input type="submit" class="btn btn-primary" value="更新">
        
{{--氏名(name)、性別(gender)、趣味(hobby)、自己紹介欄(introduction)--}}
        
    </div>
@endsection
