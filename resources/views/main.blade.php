@extends('layouts.app')

@section('title', 'Home')
@section('content')
    <div class="wrapper">
        <img class="logo" src='{{ 'images/logo2.png' }}'>
        <div class="icon_div">
            <img id="drink_icon" src='{{ 'images/sake_icon.png' }}' class='icons'>
        </div>
        <div class="icon_div">
            <img id="food_icon" src='{{ 'images/food_icon.png' }}' class='icons'>
        </div>

        <div class="menu"> 
            <ul id="food_menu">
                <li>
                    <a href='{{ URL::to('sb')}}' class='links'>Sushi Bar
                        <!-- <img src='{{ 'images/sushi_icon_no_active.png' }}' class='icons'> -->
                        <!-- <p class="icon_name">Sushi Bar</p> -->
                    </a>
                </li>     
                <li>
                    <a href='{{ URL::to('ippin')}}' class='links'>Ippin
                        <!-- <img src='{{ 'images/ippin_icon_no_active.png' }}' class='icons'> -->
                        <!-- <p class="icon_name">Ippin</p> -->
                    </a>
                </li>
                <li>
                    <a href='{{ URL::to('roll')}}' class='links'>Roll
                        <!-- <img src='{{ 'images/rolls_icon_no_active.png' }}' class='icons'> -->
                        <!-- <p class="icon_name">Roll</p> -->
                    </a>
                </li>
                <li>
                    <a href='{{ URL::to('course')}}' class='links'>Course
                        <!-- <img src='{{ 'images/course_icon_no_active.png' }}' class='icons'> -->
                        <!-- <p class="icon_name">Course</p> -->
                    </a>
                </li>
                <li>
                    <a href='{{ URL::to('lunch')}}' class='links'>Lunch
                        <!-- <img src='{{ 'images/lunch_icon_no_active.png' }}' class='icons'> -->
                        <!-- <p class="icon_name">Lunch</p> -->
                    </a>
                </li>
        </ul>
        <ul id="drink_menu">
                <li>
                    <a href='{{ URL::to('drinks/sake')}}' class='links'>Sake
                        <!-- <img src='{{ 'images/sushi_icon_no_active.png' }}' class='icons'> -->
                        <!-- <p class="icon_name">Sushi Bar</p> -->
                    </a>
                </li>     
                <li>
                    <a href='{{ URL::to('drinks/wine')}}' class='links'>Wine
                        <!-- <img src='{{ 'images/ippin_icon_no_active.png' }}' class='icons'> -->
                        <!-- <p class="icon_name">Ippin</p> -->
                    </a>
                </li>
                <li>
                    <a href='{{ URL::to('drinks/shochu')}}' class='links'>Shochu, Whisky, Spirits
                        <!-- <img src='{{ 'images/ippin_icon_no_active.png' }}' class='icons'> -->
                        <!-- <p class="icon_name">Ippin</p> -->
                    </a>
                </li>
                <li>
                    <a href='{{ URL::to('drinks/cocktail')}}' class='links'>Cocktail, Beer, Non-Alcoholic
                        <!-- <img src='{{ 'images/ippin_icon_no_active.png' }}' class='icons'> -->
                        <!-- <p class="icon_name">Ippin</p> -->
                    </a>
                </li>
                <li>
                    <a href='{{ URL::to('drinks/special')}}' class='links'>Specials
                        <!-- <img src='{{ 'images/ippin_icon_no_active.png' }}' class='icons'> -->
                        <!-- <p class="icon_name">Ippin</p> -->
                    </a>
                </li>
        </ul>
    </div>
</div>

@endsection