@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 20%; padding-bottom: 15%;">
        <div class="row">


            <div class="col-12">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="#searchHtml" class="nav-link" data-toggle="tab" role="tab" aria-controls="searchHtml" aria-selected="false">Множествонное копирование</a>
                    </li>
                    <li class="nav-item">
                        <a href="#parseHtml" class="nav-link" data-toggle="tab" role="tab" aria-controls="parseHtml" aria-selected="false">Одиночное копирование</a>
                    </li>
                </ul>
            </div>


            <div class="col-12">
                <div class="tab-content">
                    <div class="tab-pane fade" id="searchHtml" role="tabpanel" aria-labelledby="searchHtml-tab">
                        <form action="{{ route('parser.parse', 'html') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label>
                                        Ссылка на сайт
                                    </label>
                                    <input type="text" name="urlForParse" class="form-control">
                                </div>
                                <div class="form-group col-6">
                                    <label>
                                        Поисковая ссылка
                                    </label>
                                    <input type="text" name="searchUrl" class="form-control">
                                </div>
                            </div>



                            <div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name_search">Селектор для поиска названия</label>
                                        <input type="text" name="name_search" id="name_search" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name_search_count">Какой по счету текст</label>
                                        <input type="text" name="name_search_count" id="name_search_count" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name_url">Селектор для url перехода</label>
                                        <input type="text" name="name_url" id="name_url" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name_url_count">Какой по счету url перехода</label>
                                        <input type="text" name="name_url_count" id="name_url_count" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="author">Селектор для сравнения автора</label>
                                        <input type="text" name="author" id="author" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="author_count">Какой по счету селектор автора</label>
                                        <input type="text" name="author_count" id="author_count" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="search_image">Селектор для картинки</label>
                                <input type="text" name="search_image" class="form-control" id="search_image">
                            </div>

                            <div class="form-group">
                                <label for="fileExcel">Файл поиска</label>
                                <input type="file" class="form-control" id="fileExcel" name="excel">
                            </div>

                            <div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Селектор для названия</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name_count">Какой по счету текст</label>
                                        <input type="text" name="name_count" id="name_count" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="description">Селектор для описания</label>
                                        <input type="text" name="description" id="description" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="description_count">Какой по счету текст</label>
                                        <input type="text" name="description_count" id="description_count" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="isbn">Селектор для isbn</label>
                                        <input type="text" name="isbn" id="isbn" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="isbn_count">Какой по счету текст</label>
                                        <input type="text" name="isbn_count" id="isbn_count" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="genre">Селектор для жанра</label>
                                        <input type="text" name="genre" id="genre" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="genre_count">Какой по счету текст</label>
                                        <input type="text" name="genre_count" id="genre_count" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image">Селектор для картинки</label>
                                <input type="text" name="image" class="form-control" id="image">
                            </div>

                            <button type="submit" class="btn btn-primary">Начать</button>
                        </form>
                    </div>


                    <div class="tab-pane fade" id="parseHtml" role="tabpanel" aria-labelledby="parseHtml-tab">
                        <form action="{{ route('parser.parse', 'html') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>
                                    Ссылку на сайт
                                    <input type="text" name="urlForParse" class="form-control">
                                </label>
                            </div>

                            <div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Селектор для названия</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name_count">Какой по счету текст</label>
                                        <input type="text" name="name_count" id="name_count" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="description">Селектор для описания</label>
                                        <input type="text" name="description" id="description" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="description_count">Какой по счету текст</label>
                                        <input type="text" name="description_count" id="description_count" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="isbn">Селектор для isbn</label>
                                        <input type="text" name="isbn" id="isbn" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="isbn_count">Какой по счету текст</label>
                                        <input type="text" name="isbn_count" id="isbn_count" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="genre">Селектор для жанра</label>
                                        <input type="text" name="genre" id="genre" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="genre_count">Какой по счету текст</label>
                                        <input type="text" name="genre_count" id="genre_count" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="price_wholesale">Цена для оптовиков</label>
                                        <input type="text" name="price_wholesale" id="price_wholesale" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="price_retail">Цена для розницы</label>
                                        <input type="text" name="price_retail" id="price_retail" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image">Селектор для картинки</label>
                                <input type="text" name="image" class="form-control" id="image">
                            </div>

                            <button type="submit" class="btn btn-primary">Начать</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
