@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 20%; padding-bottom: 15%;">
        <div class="row">
            <div class="col-12">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="#searchXml" class="nav-link" data-toggle="tab" role="tab" aria-controls="searchXml" aria-selected="false">Parse Xml</a>
                    </li>
                    <li class="nav-item">
                        <a href="#parseXml" class="nav-link" data-toggle="tab" role="tab" aria-controls="parseXml" aria-selected="false">Parse Excel</a>
                    </li>
                </ul>
            </div>

            <div class="col-12">
                <div class="tab-content">
                    <div class="tab-pane fade" id="searchXml">
                        <form action="{{ route('parser.parse', 'xml') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>
                                    Ссылку на сайт
                                    <input type="text" name="urlForParse" class="form-control">
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary">Начать</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="parseXml">
                        <form action="{{ route('parser.parse', 'xml') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>
                                    Excel file
                                    <input type="file" name="excel" class="form-control">
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary">Начать</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection