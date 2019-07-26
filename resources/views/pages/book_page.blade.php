@extends('layouts.app')
@section('content')
    <div style="padding-top: 15%; padding-bottom: 10%;">
        <div class="container">
            <div class="row">
                <div class="col-3 p-4">
                    <div>
                        <img class="w-100 shadow" src="{{ asset('images/book4.png')  }}" alt="">
                    </div>
                </div>
                <div class="col-9 pt-4">
                    <div class="row">
                    <div class="col-12">
                        <span>
                        <a href="/">Главная</a>
                        </span>
                        <span>
                            <i class="fas fa-arrow-right fa-sm"></i>
                        </span>
                        <span>
                            <a href="">Фантастика</a>
                        </span>
                        <span>
                            <i class="fas fa-arrow-right fa-sm"></i>
                        </span>
                        <span>
                            Гарри Поттер и проклятое дитя
                        </span>
                    </div>
                        <div class="col-12 pt-3">
                            <h2 class="text-fut-bold" style="font-size: 30px; line-height: 38px; color: #000000;">
                                Гарри Поттер и проклятое дитя
                            </h2>
                            <div class="mt-4" style="font-size:16px; color: black; font-family:'Futura PT Medium Italic';">
                                <p><strong class="text-fut-bold">Автор:</strong> Роулинг Джоан Кэтлин</p>
                                <p><strong class="text-fut-bold">Издательство:</strong> Bloomsbury, 2014 г</p>
                                <p><strong class="text-fut-bold">Серия:</strong> The Harry Potter Series</p>
                            </div>

                            <div class="mt-4">
                                <p class="text-fut-bold" style="font-size: 25px; line-height: 140%;">
                                    980 сом
                                </p>
                            </div>

                            <div class="pt-4 bg-secondary">

                            </div>

                            <div class="mt-4">
                                <button  class="text-fut-bold mt-5" data-aos="fade-up" style="padding: 15px 23px; background-color: #F7E600; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.25); border:0;">
                                    Добавить в корзину
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="text-fut-book mt-5 mb-3" style="font-size: 20px; line-height: 26px; color: black;">
                О книге
            </h3>
            <p class="col-10 px-0" style="font-size: 15px; line-height: 140%; color: black;; font-family: 'Futura PT'">
                Повсюду, где бы мы ни оказались, нас окружают невидимые миры. Населяющие их животные такие крохотные, что их невозможно увидеть невооруженным глазом. И тем не менее они есть везде - на поверхности океана и морском побережье, в лесной подстилке и на кухне у нас дома, в постельном белье и даже на нашей собственной коже. Благодаря кипучей деятельности этих микроскопических существ на планете поддерживается природное равновесие. Книга позволяет не только прочитать о них, но и подробно их рассмотреть. На красочных раскладных страницах с большим увеличением и в масштабе показаны обитатели десяти микроэкосистем. Микроскопические существа изображены очень реалистично, как если бы вы разглядывали их в микроскоп.
            </p>

            <h3 class="text-fut-book mt-4 mb-3" style="font-size: 20px; line-height: 26px; color: black;">
                Как читать эту книгу
            </h3>
            <p class="col-10 px-0" style="font-size: 15px; line-height: 140%; color: black; font-family: 'Futura PT';">
                Книга состоит из 10 глав, посвященных жителям десяти микроместообитаний. Главу открывает краткое описание экосистемы. Далее в масштабе изображена жизнь в капельке морской воды и крохотном образце грунта со дна Атлантического океана; в комочке песка с пляжа, частичке лесной подстилки и веточке мха из умеренных широт; в капельке стоячей воды и в капельке чистой речной воды из умеренных широт, а также в образцах из постели, с кожи и с кухни человека. У каждого обитателя есть описание, а в конце книги вы найдете словарь и схема устройства микроскопа.
            </p>

            <h3 class="text-fut-book mt-4 mb-3" style="font-size: 20px; line-height: 26px; color: black;">
                Фишки книги
            </h3>
            <p class="col-10 px-0" style="font-size: 15px; line-height: 140%; color: black; font-family: 'Futura PT';">
                Необычная яркая тема увлечет даже взрослого;
                Откроет невероятный незримый мир и его обитателей: от капли воды до кожи человека;
                Красивые сочные яркие разворотные иллюстрации;
                Книга состоит из 10 глав, посвященных жителям десяти микроместообитаний;
                У каждого обитателя имеется описание, составленное со скрупулезной научной точностью, и номер, по которому его легко отыскать на рисунке;
                В конце есть словарь, где разъясняются сложные понятия и термины, краткая история микроскопии и схема устройства микроскопа, даются таблицы с точными портретами клещей и простейших, представленных в книге.
            </p>

            <h3 class="text-fut-book mt-4 mb-3" style="font-size: 20px; line-height: 26px; color: black;">
                Для кого эта книга
            </h3>
            <p class="col-10 px-0" style="font-size: 15px; line-height: 140%; color: black; font-family: 'Futura PT';">
                Для детей от 7-ми лет.
            </p>

            <h3 class="text-fut-book mt-4 mb-3" style="font-size: 20px; line-height: 26px; color: black;">
                Для любопытных любого возраста.
            </h3>

            <h3 class="text-fut-book mt-4 mb-3" style="font-size: 20px; line-height: 26px; color: black;">
                Об авторах
            </h3>
            <p class="col-10 px-0" style="font-size: 15px; line-height: 140%; color: black; font-family: 'Futura PT';">
                Элен Ражкак - художник-иллюстратор. Родилась в Париже в 1981 году. Закончила Национальную высшую школу прикладных искусств, изучала технику гравюры в Школе искусств и полиграфии, занималась дизайном тканей.
            </p>

            <p class="col-10 px-0 mt-4" style="font-size: 15px; line-height: 140%; color: black; font-family: 'Futura PT';">
                ДамьенЛавердан - писатель и иллюстратор-график, преподаватель прикладного искусства в парижском лицее. Родился в 1978 году в Париже. Учился в Высшей школе прикладных искусств Дюперре, получил диплом Национальной высшей школы прикладных искусств.
            </p>

            <p class="col-10 px-0 mt-4" style="font-size: 15px; line-height: 140%; color: black; font-family: 'Futura PT';">
                Объединившись, Элен Ражкак и ДамьенЛавердан создали арт-дуэт TigresGauchers ("Тигры-левши"), и уже стали авторами нескольких успешных книг для детей и подростков.
            </p>



                <h3 class="text-fut-bold mt-5 mb-3" style="font-size: 20px; line-height: 26px; color: black;">
                    Сопутствующие товары
                </h3>
            <div class="row">
                <div class="col-10">
                    <div class="row">
                        @for($i =0; $i <4; $i++)
                        <div class="col-lg-3 col-12">
                            <div class="p-4 shadow" style="background-color: white;">
                                <img class="w-100" src="{{ asset('images/book4.png') }}" alt="">
                                <h3 class="font-weight-bold text-fut-bold mt-3 text-left" style="font-size: 18px; line-height: 110%; letter-spacing: 0.05em; color: #000000;">
                                    В движении.
                                    <br>
                                    История жизни
                                </h3>
                                <div class="container-fluid row mr-0 pr-0">
                                    <div class="col-7 p-0 text-left">
                                                <span class="text-fut-bold" style="font-size:18px; letter-spacing: 0.05em;">
                                                    648 сом
                                                </span>
                                    </div>
                                    <div class="col-2 p-0">
                                        <img class="w-100" src="{{ asset('images/inactivelike.png') }}" alt="">
                                    </div>
                                    <div class="col-1 p-0"></div>
                                    <div class="col-2 p-0">
                                        <img class="w-100" src="{{ asset('images/tobasket.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endfor
                    </div>
                </div>
            </div>

            <div class="" style="margin-top: 10%;">
                <h3 class="text-fut-bold mt-4 mb-3" style="font-size: 20px; line-height: 26px; color: black;">
                    Рецензии на книгу "Гарри Поттер и проклятое дитя"
                </h3>
                <p class="text-fut-bold mt-5" style="font-size: 16px; line-height: 21px; color: #000000;">
                    Фамилия и Имя
                </p>
                <p class="text-fut-book" style="font-size: 16px; line-height: 21px; color: #000000;">
                    <span>Понравилось? <span class="text-fut-bold pl-3" style="color: #019D38;">Да</span></span>
                </p>

                <p class="text-fut-book col-6 px-0" style="font-size: 16px; line-height: 21px; color: #000000;">
                    Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст..
                </p>

                <p class="text-fut-light" style="font-size: 15px; line-height: 140%; color: #838383;">
                    14.10.2019г
                </p>
                <div class="col-6 p-0">
                    <hr>
                </div>
            </div>
            <button  class="text-fut-bold mt-5" data-aos="fade-up" style="padding: 15px 23px; background-color: #3154CF; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.25); border:0; color: white;">
                Оставить рецензию
            </button>
        </div>
    </div>
@endsection