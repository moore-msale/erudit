@extends('layouts.app')
@section('content')
    <div class="container" style="padding-top: 15%; padding-bottom: 5%;">
        <h1 class="font-weight-bold">Контакты</h1>

        <div class="row align-items-center">
            <div class="col-6">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <p class="nav-link m-0">Книжный магазин "Эрудит" "DORDOI Plaza-2" -1 этаж</p>
                    </li>
                    <li class="nav-item">
                        <p class="nav-link m-0">10:00-22:00</p>
                    </li>
                    <li class="nav-item">
                        <p class="nav-link m-0">Доставка по всему КР</p>
                    </li>
                    <li class="nav-item">
                        <a href="tel:+996 501 433 433" class="nav-link">
                            <i class="fas fa-phone"></i>&nbsp;+996 501 433 433
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="https://api.whatsapp.com/send?phone=996551433433" class="nav-link text-capitalize">
                            <i class="fab fa-whatsapp"></i>&nbsp;whatsapp
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.instagram.com/erudit_kg/?hl=ru" class="nav-link text-capitalize">
                            <i class="fab fa-instagram"></i>&nbsp;instagram
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-6">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2923.9355903327996!2d74.61588031494024!3d42.87420361047025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x389eb7b88acd14ab%3A0x72406e3d43498df7!2z0JTQvtGA0LTQvtC5INCf0LvQsNC30LA!5e0!3m2!1sru!2skg!4v1567070922633!5m2!1sru!2skg"
                    frameborder="0" style="border:0;width: 100%; height: 400px;" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
@endsection
