@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('store') }}" method="POST">
                        @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="content" rows="3" placeholder="ここにメモを入力"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">保存</button>
                    </form>
                    <div>
                        @foreach($articles as $article)
                        <p>{{$article['content']}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
