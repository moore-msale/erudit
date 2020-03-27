<div class="form-group">
    <p class="text-danger">Если вы ставите скидку на категорию, выберите категорию, но не выбирайте товар.</p>
    <label for="category">Выберите категорию</label>
    <p class="text-fut-light"></p>
    <select class="form-control input-erudit" name="category" id="category">
        <option value="0">Выберите категорию</option>
        @foreach(\App\Genre::all()->sortBy('name') as $genre)
            <option value="{{$genre->id}}">{{$genre->name}}</option>
        @endforeach
    </select>
</div>
