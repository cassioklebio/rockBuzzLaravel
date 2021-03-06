@extends('layouts.admin')

@section('content')
    <div class="container">
        <breadcrumb v-bind:lista="{{$listaBreadCrumb}}"></breadcrumb>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tags Create</div>

                    <div class="card-body">
                        <form action="{{ url('posts/store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group has-feedback{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="text-muted">Title</label>
                                <input id="title" type="text" name="title" class="form-control">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group has-feedback{{ $errors->has('body') ? ' has-error' : '' }}">
                                <label for="body" class="text-muted">Body</label>
                                <textarea id="body" name="body" rows="10" class="form-control"></textarea>
                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">store</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
