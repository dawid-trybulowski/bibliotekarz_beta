<?php


namespace App\Mappers;


class BooksOrderByMapper
{
    public $map =
        [
            'DESC|created_at' => 'Data dodania - malejąco',
            'ASC|created_at' => 'Data dodania - rosnąco',
            'ASC|rate' => 'Ocena - od najlepszych',
            'DESC|rate' => 'Ocena - od najgorszych',
            'ASC|title' => 'Tytuł - alfabetycznie',
            'ASC|author' => 'Autor - alfabetycznie'
        ];
}