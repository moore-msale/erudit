<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function show(Book $book)
    {
        $genres_id = [];
        $books_id = [];
        $genres = DB::table('genres')
            ->select('genre_id')
            ->join('book_genre', 'genres.id', '=', 'book_genre.genre_id')
            ->where('book_genre.book_id', 'like', $book->id)->get();
        foreach ($genres as $key=>$items){
            foreach ($items as $key_value=>$value){
                if ($value != 5) {
                    array_push($genres_id, $value);
                }
            }
        }
        $book_id = DB::table('books')
            ->select('*')
            ->join('book_genre', 'books.id', '=', 'book_genre.book_id')
            ->whereIn('book_genre.genre_id', $genres_id)->get();

        foreach ($book_id as $key=>$item){
            foreach ($item as $key_value_2=>$value_2){
                if ($key_value_2 == 'isbn'){
                    array_push($books_id, $value_2);
                }
            }

        }

//        dd($book_id);
        $sames = Book::all()->whereIn('isbn', $books_id)->whereNotIn('isbn', $book->isbn)->take(4)->reverse();
        return view('books/show', [
            'book' => $book,
            'sames' => $sames
        ]);
    }

//    public function genre_sort()
//    {
//        $books = Book::where('genre_id', null)->get();
//
//        foreach ($books as $book)
//        {
//            if($book->attributes && $book->pages)
//            {
//                $genre = Genre::where('name', $book->attributes)->get()->first();
//
//                if(isset($genre))
//                {
//                    $book->genre_id = $genre->id;
//                    $book->save();
//                }
//                else
//                {
//                    $genre = new Genre();
//                    $genre->name = $book->attributes;
//                    $genre->save();
//                    $book->genre_id = $genre->id;
//                    $book->save();
//                }
//            }
//        }
//    }
    public function delete_duplicate()
    {
        $books = Book::all();
        foreach ($books as $book)
        {
            $duplicates = Book::where('name',$book->name)->get();
            if(count($duplicates) > 1)
            {
                $count = 1;
                foreach ($duplicates as $duplicate)
                {
                    if ($count == 1)
                    {
                        $count = 2;
                        continue;
                    }
                    else
                    {
                        $duplicate->delete();
                    }
                }
            }
        }
    }

    public function site_sort()
    {
        $books = Book::all();
        foreach ($books as $book)
        {
            $lower = mb_strtolower($book->name);
//            if(!$genre->name){
//                if (stristr($lower, 'фанта') == true || stristr($lower, 'фэнтэз') == true || stristr($lower, 'фентез') == true ) {
//                    $genre = Genre::where('name', 'Фантастика')->get()->first();
//                    if ($genre) {
//
//                        continue;
//                    } else {
//                        $genre = new Genre();
//                        $genre->name = 'Фантастика';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'англ') == true)
//                {
//                    $genre = Genre::where('name', 'Книги на английском')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Книги на английском';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'класси') == true && stristr($lower, 'литера') == true)
//                {
//                    $genre = Genre::where('name', 'Классическая литература')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Классическая литература';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'дизайн') == true && stristr($lower, 'интерьер') == true && stristr($lower, 'архитек') == true)
//                {
//                    $genre = Genre::where('name', 'Дизайн и архитектура')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Дизайн и архитектура';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'детектив') == true )
//                {
//                    $genre = Genre::where('name', 'Детективы')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Детективы';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'детей') == true && stristr($lower, 'детск') == true || stristr($lower, 'до 7 лет') == true
//                    || stristr($lower, 'до 3 лет') == true || stristr($lower, 'От 7 до 12 лет') == true)
//                {
//                    $genre = Genre::where('name', 'Детские')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Детские';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'комикс') == true || stristr($lower, 'манг') == true || stristr($lower, 'артбук') == true || stristr($lower, 'магия и колдовство') == true)
//                {
//                    $genre = Genre::where('name', 'Комиксы, Манги, Артбуки')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Комиксы, Манги, Артбуки';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'басн') == true)
//                {
//                    $genre = Genre::where('name', 'Басни')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Басни';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'современ') == true && stristr($lower, 'проза') == true)
//                {
//                    $genre = Genre::where('name', 'Современная проза')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Современная проза';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'класси') == true && stristr($lower, 'проза') == true)
//                {
//                    $genre = Genre::where('name', 'Классическая проза')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Классическая проза';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'сказк') == true)
//                {
//                    $genre = Genre::where('name', 'Сказки')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Сказки';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'энциклопед') == true)
//                {
//                    $genre = Genre::where('name', 'Энциклопедии')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Энциклопедии';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'макия') == true || stristr($lower, 'маникюр') == true || stristr($lower, 'стрижка') == true
//                    || stristr($lower, 'этикет') == true)
//                {
//                    $genre = Genre::where('name', 'Красота. Этикет')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Красота. Этикет';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//
//                if (stristr($lower, 'беременность и роды') == true || stristr($lower, 'родите') == true || stristr($lower, 'мам и пап') == true || stristr($lower, 'воспитание') == true)
//                {
//                    $genre = Genre::where('name', 'Книги для родителей')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Книги для родителей';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//
//                if (stristr($lower, 'тренинг') == true || stristr($lower, 'тайм-менеджмент') == true || stristr($lower, 'эффективн') == true || stristr($lower, 'рост') == true)
//                {
//
//                    $genre = Genre::where('name', 'Развивающие')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Развивающие ';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//
//                if (stristr($lower, 'роман') == true)
//                {
//                    $genre = Genre::where('name', 'Романы')->get()->first();
//
//                    if(isset($genre)){
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Романы';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//
//                if (stristr($lower, 'стих') == true)
//                {
//                    $genre = Genre::where('name', 'Стихи')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Стихи';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//
//                if (stristr($lower, 'психолог') == true)
//                {
//                    $genre = Genre::where('name', 'Психология')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Психология';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//
//                if (stristr($lower, 'экономик') == true || stristr($lower, 'бизнес') == true || stristr($lower, 'маркетин') == true
//                    || stristr($lower, 'продаж') == true || stristr($lower, 'менеджмент') == true || stristr($lower, 'финанс') == true
//                    || stristr($lower, 'монеты') == true || stristr($lower, 'брендинг') == true || stristr($lower, 'Бухгалтерия') == true
//                    || stristr($lower, 'Инвестиции') == true || stristr($lower, 'предпринимательства') == true)
//                {
//                    $genre = Genre::where('name', 'Экономика')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Экономика';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//
//                if (stristr($lower, 'боевик') == true)
//                {
//                    $genre = Genre::where('name', 'Боевик')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Боевик';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'животн') == true && stristr($lower, 'мир') == true || stristr($lower, 'растите') == true && stristr($lower, 'мир') == true)
//                {
//                    $genre = Genre::where('name', 'Животный и растительный мир')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Животный и растительный мир';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'кухн') == true || stristr($lower, 'выпечк') == true || stristr($lower, 'рецепты') == true
//                    || stristr($lower, 'блюда') == true || stristr($lower, 'кулинар') == true || stristr($lower, 'закуски') == true || stristr($lower, 'десерты') == true)
//                {
//
//                    $genre = Genre::where('name', 'Кухня')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Кухня';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'философ') == true)
//                {
//                    $genre = Genre::where('name', 'Философия')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Философия';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'наук') == true || stristr($lower, 'техника') == true || stristr($lower, 'транспорт') == true
//                    || stristr($lower, 'земля') == true || stristr($lower, 'автомобили') == true || stristr($lower, 'машиностроение') == true
//                    || stristr($lower, 'связь') == true)
//                {
//                    $genre = Genre::where('name', 'Наука. Техника. Транспорт')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Наука. Техника. Транспорт';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'поэзия') == true)
//                {
//                    $genre = Genre::where('name', 'Поэзия')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Поэзия';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//
//                if (stristr($lower, 'анатоми') == true || stristr($lower, 'физиолог') == true  || stristr($lower, 'справочни') == true
//                    || stristr($lower, 'сборники') == true || stristr($lower, 'знакомство') == true || stristr($lower, 'шитье') == true
//                    || stristr($lower, 'руководство') == true || stristr($lower, 'обучение') == true || stristr($lower, 'язык') == true
//                    || stristr($lower, 'задани') == true || stristr($lower, 'флористи') == true || stristr($lower, 'хими') == true
//                    || stristr($lower, 'путеводители') == true || stristr($lower, 'биологи') == true || stristr($lower, 'географи') == true
//                    || stristr($lower, 'физи') == true || stristr($lower, 'информатика') == true || stristr($lower, 'зоология') == true
//                    || stristr($lower, 'обществознание') == true || stristr($lower, 'биографии') == true || stristr($lower, 'экзамен') == true)
//                {
//
//                    $genre = Genre::where('name', 'Учебные')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Учебные';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'рыбалка') == true || stristr($lower, 'охота') == true || stristr($lower, 'юмор') == true
//                    || stristr($lower, 'загадки') == true || stristr($lower, 'день рождения') == true || stristr($lower, 'заметки') == true)
//                {
//                    $genre = Genre::where('name', 'Развлечение')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Развлечение';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'спорт') == true || stristr($lower, 'фитнес') == true || stristr($lower, 'футбол') == true
//                    || stristr($lower, 'футбол') == true  || stristr($lower, 'единоборства') == true  || stristr($lower, 'йога') == true )
//                {
//                    $genre = Genre::where('name', 'Спорт')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Спорт';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//
//                if (stristr($lower, 'програм') == true || stristr($lower, 'графика') == true  || stristr($lower, 'дизайн') == true
//                    || stristr($lower, 'анализ данных') == true || stristr($lower, 'информатика') == true || stristr($lower, 'сети и коммуникации') == true
//                    || stristr($lower, 'Искусственный интеллект') == true || stristr($lower, 'ИИ') == true)
//                {
//                    $genre = Genre::where('name', 'IT')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'IT';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//
//                if (stristr($lower, 'культура') == true)
//                {
//                    $genre = Genre::where('name', 'Культура')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Культура';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//
//                if (stristr($lower, 'сми') == true || stristr($lower, 'журналисти') == true || stristr($lower, 'реклама') == true)
//                {
//                    $genre = Genre::where('name', 'Журналистика')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Журналистика';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'медици') == true || stristr($lower, 'гинеколо') == true || stristr($lower, 'акушерст') == true
//                    || stristr($lower, 'болезн') == true || stristr($lower, 'диета') == true || stristr($lower, 'хирургия') == true
//                    || stristr($lower, 'оториноларингология') == true || stristr($lower, 'формакология') == true || stristr($lower, 'Правильное питание') == true
//                    || stristr($lower, 'здоров') == true || stristr($lower, 'педиатрия') == true || stristr($lower, 'реабилитация') == true || stristr($lower, 'стоматология') == true)
//                {
//                    $genre = Genre::where('name', 'Медицина. Здоровье')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Медицина. Здоровье';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//
//                if (stristr($lower, 'ислам') == true || stristr($lower, 'христианст') == true || stristr($lower, 'иудаизм') == true
//                    || stristr($lower, 'религи') == true || stristr($lower, 'библия') == true || stristr($lower, 'коран') == true
//                    || stristr($lower, 'католицизм') == true || stristr($lower, 'православ') == true)
//                {
//                    $genre = Genre::where('name', 'Религия')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Религия';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'история') == true || stristr($lower, 'исторические') == true || stristr($lower, 'век') == true
//                    || stristr($lower, 'Древний мир') == true || stristr($lower, 'архив') == true)
//                {
//
//                    $genre = Genre::where('name', 'История')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'История';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//
//                if (stristr($lower, 'политик') == true)
//                {
//                    $genre = Genre::where('name', 'Политика')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Политика';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//
//                if (stristr($lower, 'социолог') == true)
//                {
//                    $genre = Genre::where('name', 'Социлогия')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Социлогия';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//
//                if (stristr($lower, 'музыка') == true || stristr($lower, 'песен') == true)
//                {
//                    $genre = Genre::where('name', 'Музыкальные')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Музыкальные';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//
//                if (stristr($lower, 'юриспруденция') == true || stristr($lower, 'суд') == true  || stristr($lower, 'закон') == true)
//                {
//                    $genre = Genre::where('name', 'Юриспруденция')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Юриспруденция';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'литератур') == true)
//                {
//                    $genre = Genre::where('name', 'Литература')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Литература';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'зарубежные') == true)
//                {
//                    $genre = Genre::where('name', 'Зарубежные')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Зарубежные';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'логика') == true)
//                {
//                    $genre = Genre::where('name', 'Логика')->get()->first();
//                    if(isset($genre)){
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Логика';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'эпос') == true || stristr($lower, 'фольклор') == true)
//                {
//                    $genre = Genre::where('name', 'Эпос и фольклор')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Эпос и фольклор';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'мемуары') == true)
//                {
//                    $genre = Genre::where('name', 'Мемуары')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Мемуары';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'секс') == true || stristr($lower, 'камасутра') == true || stristr($lower, 'эротика') == true)
//                {
//                    $genre = Genre::where('name', 'Взрослый контент')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Взрослый контент';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, '80 листов') == true)
//                {
//                    $genre = Genre::where('name', '80 листов')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = '80 листов';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'детская комната') == true)
//                {
//                    $genre = Genre::where('name', 'Детская комната')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Детская комната';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//                if (stristr($lower, 'научная') == true || stristr($lower, 'научно-популярн') == true)
//                {
//                    $genre = Genre::where('name', 'Научная и научно-популярная')->get()->first();
//                    if(isset($genre)) {
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                    else
//                    {
//                        $genre = new Genre();
//                        $genre->name = 'Научная и научно-популярная';
//                        $genre->save();
//                        $book->genre_id = $genre->id;
//                        $book->save();
//                        continue;
//                    }
//                }
//
//                $genre = Genre::where('name', 'Другое')->get()->first();
//                if(isset($genre)) {
//                    $book->genre_id = $genre->id;
//                    $book->save();
//                    continue;
//                }
//                else
//                {
//                    $genre = new Genre();
//                    $genre->name = 'Другое';
//                    $genre->save();
//                    $book->genre_id = $genre->id;
//                    $book->save();
//                    continue;
//                }
//            }

            if (stristr($lower, 'раскраск') == true || stristr($lower, 'гуашь') == true || stristr($lower, 'плакаты') == true
                || stristr($lower, 'пластилин') == true || stristr($lower, 'праздничные') == true || stristr($lower, 'наклейки') == true
                || stristr($lower, 'наклейки') == true || stristr($lower, 'картинк') == true || stristr($lower, 'карты таро') == true
                || stristr($lower, 'квилтинг') == true || stristr($lower, 'кубики') == true || stristr($lower, 'декупаж') == true
                || stristr($lower, 'украшения') == true || stristr($lower, 'макраме') == true || stristr($lower, 'материалы') == true
                || stristr($lower, 'Сопутствующие товары для детского творчества') == true || stristr($lower, 'буквы на магнитах') == true
                || stristr($lower, 'трафареты') == true || stristr($lower, 'мозаика') == true || stristr($lower, 'краски') == true
                || stristr($lower, 'оригами') == true)
            {
                $book->type = 'creativity';
                $book->save();
                continue;
            }

            if (stristr($lower, 'пазл') == true || stristr($lower, 'пазл') == true || stristr($lower, 'игруш') == true || stristr($lower, 'кино') == true
                || stristr($lower, 'шашки') == true || stristr($lower, 'кроссворды') == true || stristr($lower, 'головоломки') == true
                || stristr($lower, 'обучающие игры') == true || stristr($lower, 'домино') == true || stristr($lower, 'конструкторы') == true
                || stristr($lower, 'игры с мишенью') == true || stristr($lower, 'игры с карточками') == true || stristr($lower, 'карточные игры') == true
                || stristr($lower, 'книги-игрушки') == true )
            {
                $book->type = 'game';
                $book->save();
                continue;
            }

            if (stristr($lower, 'тетрад') == true || stristr($lower, 'блокноты') == true || stristr($lower, 'атласы') == true
                || stristr($lower, 'плакаты') == true || stristr($lower, 'органайзер') == true || stristr($lower, 'карандаш') == true
                || stristr($lower, 'ручк') == true || stristr($lower, 'ручек') == true || stristr($lower, 'открытк') == true
                || stristr($lower, 'дневники') == true || stristr($lower, 'скетчбуки') == true || stristr($lower, 'записные книжки') == true
                || stristr($lower, 'планинги') == true || stristr($lower, 'ластики') == true || stristr($lower, 'канцеляр') == true
                || stristr($lower, 'письма') == true || stristr($lower, 'пеналы') == true || stristr($lower, 'черчения') == true
                || stristr($lower, 'альбомы ') == true || stristr($lower, 'конверты') == true || stristr($lower, 'закладки для книг') == true
                || stristr($lower, 'черчения') == true || stristr($lower, 'фотоальбом') == true || stristr($lower, 'ножницы') == true
                || stristr($lower, 'маркеры') == true || stristr($lower, 'обложк') == true || stristr($lower, 'бумага') == true
                || stristr($lower, 'линейк') == true || stristr($lower, 'мелки восковые') == true || stristr($lower, 'вышивка') == true
                || stristr($lower, 'циркули') == true || stristr($lower, 'счетные палочки') == true  || stristr($lower, 'визитницы ') == true
                || stristr($lower, 'календар') == true || stristr($lower, 'точилки') == true || stristr($lower, 'таблички') == true
                || stristr($lower, 'кисть') == true || stristr($lower, 'клей') == true || stristr($lower, 'фломастеры') == true
                || stristr($lower, 'глобусы') == true || stristr($lower, 'стаканы-непроливайки') == true || stristr($lower, 'подставки для книг') == true
                || stristr($lower, 'переплетмягкий') == true || stristr($lower, 'переплеткартон') == true )
            {
                $book->type = 'stationery';
                $book->save();
                continue;
            }
        }
    }

}
