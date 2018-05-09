<?php

namespace App\Mappers;

class BookMapper
{
    public $map =
        [
            'title' => "tytuł",
            'unified_title' => 'tytuł zunifikowany',
            'author' => 'autor',
            'subauthors' => 'spółautorzy',
            'description' => 'opis',
            'content_description' => 'opis_zawartości',
            'status' => 'status',
            'items' => 'ilość dostępnych egzemplarzy',
            'rate' => 'ocena',
            'rate_count' => 'ilość ocen',
            'genres' => 'gatunki',
            'category_id' => 'kategoria',
            'isbn' => 'isbn',
            'language' => 'język',
            'publishing_house' => 'wydawnictwo',
            'publication_country_code' => 'kraj wydania',
            'pages' => 'ilość stron',
            'edition' => 'wydanie',
            'binding' => 'oprawa',
            'location_code' => 'kod lokalizacji',
            'owner' => 'właściciel',
            'keys' => 'klucze',
            'created_at' => 'data utworzenia rekordu',
            'updated_at' => 'data edycko rekordu',
        ];
}