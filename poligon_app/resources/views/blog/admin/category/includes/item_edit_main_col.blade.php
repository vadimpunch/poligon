@php
/** @var \App\Models\BlogCategory $item */
@endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#maindata" class="nav-link active" data-toggle="tab" role="tab">Основные данные</a>
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
                                   maxlength="3"
                                   required
                            >
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
                            <label for="parent_id">Родитель</label>
                            <select

                                    id="parent_id"
                                    name="parent_id"
                                    value="{{$item->slug}}"
                                    class="form-control"
                                    placeholder="Выберите категорию"
                                    required
                            >
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{$categoryOption->id}}">
                                        @if($categoryOption->id == $item->id) selected @endif>
                                        {{$categoryOption->id}}. {{$categoryOption->title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Идентификатор</label>
                            <textarea
                                    type="text"
                                    id="description"
                                    name="description"
                                    class="form-control"
                                    rows="3"
                            >
                                {{$item->description}}
                            </textarea>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>