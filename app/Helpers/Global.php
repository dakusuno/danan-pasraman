<?php
use App\Sisya;
use App\Nabe;
use App\Mapel;
use App\Materi;

function ranking5Besar () //helper rangking 5besar
{
    $sisya = Sisya::all();
        $sisya->map(function($s){
            $s->totalNilai = $s->totalNilai();
            return $s;
        });
        $sisya = $sisya->sortByDesc('totalNilai')->take(5);
        return $sisya;
}

function totalSisya()
{   
    return Sisya::count();
}

function totalNabe()
{
    return Nabe::count();
}

function totalMapel()
{
    return Mapel::count();
}

function totalMateri()
{
    return Materi::count();
}

// function totalJrMangku()
// {
//     $sisya = Sisya::where('tingkat','Jro Mangku')->get()->count();
// }
