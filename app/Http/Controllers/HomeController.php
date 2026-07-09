<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $activities = Activity::orderByDesc('event_date')->take(2)->get();

        $settings = [
            'hero_title_1' => Setting::get('hero_title_1', "Membentuk Generasi Qur'ani"),
            'hero_title_2' => Setting::get('hero_title_2', 'Berilmu Dan Berakhlak Mulia'),
            'hero_text' => Setting::get('hero_text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
            'hero_image' => Setting::get('hero_image'),
            'sambutan_nama' => Setting::get('sambutan_nama', 'Lorem Ipsum Lorem Ipsum Dolor'),
            'sambutan_isi' => Setting::get('sambutan_isi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
            'sambutan_foto' => Setting::get('sambutan_foto'),
        ];

        return view('site.home', compact('activities', 'settings'));
    }
}
