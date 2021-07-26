@extends('layouts.app')
@section('content')
    @php /**    @var \App\Models\BlogPost $item */ @endphp
    <div class="container">
        @include('blog.admin.post.includes.result_messages')

    @if($item->exists)
        <form method='POST' action="{{route('blog.admin.post.update', $item->id)}}">
            @method('PATCH')
    @else
        <form method='POST' action="{{route('blog.admin.post.store')}}">
    @endif
            @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                @include('blog.admin.post.includes.item_edit_main_col')
                            </div>
                            <div class="col-md-3">
                                @include('blog.admin.post.includes.item_edit_add_col')
                            </div>
                        </div>

                </form>
        </div>
        @if($item->exists)
            <br>
            <form method="post" action="{{route('blog.admin.post.destroy', $item->id)}}">
            @method('DELETE')
            @csrf
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card card-block">
                            <div class="card-body ml-auto">
                                <button type="submit" class="btn btn-link">Удалить</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </form>
        @endif
@endsection