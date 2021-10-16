@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('編集') }}</div>
                <div class="card-body" >
                    <form action="{{route('update')}}" method="POST">
                        @csrf
                    <input type="hidden" name="article_id" value="{{$edit_article[0]['id']}}">
                    <div class="form-group">
                        <textarea class="form-control" name="content" rows="3">{{$edit_article[0]['content']}}</textarea>
                    </div>
                        <button type="submit" class="mt-3 btn btn-primary">更新</button>
                    </form>
                    <form action="{{route('destroy')}}" method="POST">
                        @csrf
                        <input type="hidden" name="article_id" value="{{$edit_article[0]['id']}}"/>
                        <button type="submit" class="mt-3 btn btn-primary">削除</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
