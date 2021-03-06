<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
               <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </div>
</div>
@if($item->exists)
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>ID: {{$item->id}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Создано</label>
                        <input type="text" class="form-control" disabled value="{{$item->created_at}}">
                    </div>
                    <div class="form-group">
                        <label for="title">Изменено</label>
                        <input type="text" class="form-control" disabled value="{{$item->updated_at}}">
                    </div>
                    <div class="form-group">
                        <label for="title">Опубликованно</label>
                        <input type="text" class="form-control" disabled value="{{$item->published_at}}">
                    </div>
                    <div class="form-group">
                        <label for="title">Удалено</label>
                        <input type="text" class="form-control" disabled value="{{$item->deleted_at}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif