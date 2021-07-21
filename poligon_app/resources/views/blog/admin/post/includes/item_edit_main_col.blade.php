@php
/** @var \App\Models\BlogPost $item */
@endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if($item->is_published)
                    Опубликованно
                    @else
                    Черновик
                @endif
            </div>
            <div class="card-body">
                <div class="card-title"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#maindata" class="nav-link active" data-toggle="tab"  role="tab">Основные данные</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" data-toggle="tab" href="#adddata"  role="tab">Доп данные</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input
                                   type="text"
                                   name="title"
                                   id="title"
                                   value="{{$item->title}}"
                                   class="form-control"
                                   minlength="3"
                                   required
                            >
                        </div>
                        <div class="form-group">
                            <label for="content_raw">Текст</label>
                            <textarea
                                    id="content_raw"
                                    name="content_raw"
                                    class="form-control"
                                    rows="20"
                            >
                                {{old('content_raw', $item->content_raw)}}
                            </textarea>
                        </div>
                    </div>

                    <div class="tab-pane" id="adddata" role="tabpanel">
                        <div class="form-group">
                            <label for="parent_id">Категория</label>
                            <select

                                    id="category_id"
                                    name="category_id"
                                    class="form-control"
                                    placeholder="Выберите категорию"
                                    required
                            >
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{$categoryOption->id}}"
                                         @if($categoryOption->id == $item->category_id) selected @endif
                                    >
                                        {{$categoryOption->id_title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slug">Идентификатор</label>
                            <input
                                    type="text"
                                    id="slug"
                                    name="slug"
                                    value="{{$item->slug}}"
                                    class="form-control"
                            >
                        </div>
                        <div class="form-group">
                            <label for="excerpt">Выдержка</label>
                            <textarea
                                    id="excerpt"
                                    name="excerpt"
                                    class="form-control"
                                    rows="5"
                            >
                                {{old('excerpt', $item->excerpt)}}
                            </textarea>
                        </div>

                        <div class="form-group float-right">
                            <input
                                    type="hidden"
                                    name="is_published"
                                    value="0"
                            >
                            <input
                                   type="checkbox"
                                   class="form-check-input"
                                   name="is_published"
                                   value="1"
                                    @if($item->is_published)
                                        checked="checked"
                                    @endif

                            >
                            <label class="form-check-label" for="exampleCheck1">Опубликованно</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>