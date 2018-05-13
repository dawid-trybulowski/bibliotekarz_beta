<?php

use App\Models\Config;
use Illuminate\Database\Seeder;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $config = new Config();
        $config->name = 'library_name';
        $config->type = 'string';
        $config->value = "Moja biblioteka";
        $config->save();

        $config = new Config();
        $config->name = 'library_phone';
        $config->type = 'string';
        $config->value = "123456789";
        $config->save();

        $config = new Config();
        $config->name = 'library_address';
        $config->type = 'string';
        $config->value = "Testowa 1 00-000 Testowo";
        $config->save();

        $config = new Config();
        $config->name = 'books_rates';
        $config->type = 'json';
        $config->value = '{"1":{"string":"Okropna","color":"#da4040"},"2":{"string":"S\u0142aba","color":"#da4040"},"3":{"string":"\u015arednia","color":"#e1a52a"},"4":{"string":"Dobra","color":"#6eb767"},"5":{"string":"Wspania\u0142a","color":"#6eb767"}}';
        $config->save();

        $config = new Config();
        $config->name = 'library_email';
        $config->type = 'string';
        $config->value = "example@example.pl";
        $config->save();

        $config = new Config();
        $config->name = 'reservation_time';
        $config->type = 'string';
        $config->value = "3";
        $config->save();

        $config = new Config();
        $config->name = 'max_reservation_count';
        $config->type = 'string';
        $config->value = "3";
        $config->save();

        $config = new Config();
        $config->name = 'borrow_time';
        $config->type = 'string';
        $config->value = "30";
        $config->save();

        $config = new Config();
        $config->name = 'reservation_without_verification';
        $config->type = 'string';
        $config->value = "1";
        $config->save();

        $config = new Config();
        $config->name = 'books_per_page';
        $config->type = 'string';
        $config->value = "10";
        $config->save();

        $config = new Config();
        $config->name = 'age_limit';
        $config->type = 'string';
        $config->value = "0";
        $config->save();

        $config = new Config();
        $config->name = 'books_statuses';
        $config->type = 'json';
        $config->value = '{
  "0": {
    "string": "Niedostępna",
    "color": "#da4040"
  },
  "1": {
    "string": "Dostępna",
    "color": "#6eb767"
  },
  "2": {
    "string": "Dostępna w czytelni",
    "color": "#da4040"
  }
}';
        $config->save();
        $config = new Config();
        $config->name = 'users_statuses';
        $config->type = 'json';
        $config->value = '{
  "0": {
    "string": "Niezweryfikowane",
    "description": "Konto nie zostało jeszcze zweryfikowane. W celu dokończenia weryfikacji konieczna jest wizyta w bibliotece i potwierdzenie danych",
    "icon": "fas fa-exclamation-circle"
  },
  "1": {
    "string": "Zweryfikowane",
    "description": "Konto zostało zweryfikowane i posiada pełne uprawnienia",
    "icon": "far fa-check-circle"
  },
  "2": {
    "string": "Zamknięte",
    "description": "Konto nieaktywne",
    "icon": "far fa-times-circle"
  }
}';
        $config->save();
        $config = new Config();
        $config->name = 'reservations_statuses';
        $config->type = 'json';
        $config->value = '{
  "0": {
    "string": "Zakończona"
  },
  "1": {
    "string": "Aktywna"
  },
  "2": {
    "string": "Zmieniona w wypożyczenie"
  }';
        $config->save();

        $config = new Config();
        $config->name = 'borrows_statuses';
        $config->type = 'json';
        $config->value = '{
  "0": {
    "string": "Zakończona"
  },
  "1": {
    "string": "Aktywna"
  },
  "2": {
    "string": "Aktywna opóźniona"
  },
  "3": {
    "string": "Zakończona opóźniona"
  }
}';
        $config->save();

        $config = new Config();
        $config->name = 'items_statuses';
        $config->type = 'json';
        $config->value = '{
  "0": {
    "string": "Niedostępny",
    "color": "#da4040"
  },
  "1": {
    "string": "Dostępny",
    "color": "#6eb767"
  }
}';
        $config->save();

        $config = new Config();
        $config->name = 'przelewy24_config';
        $config->type = 'json';
        $config->value = '{"p24_merchant_id":"","p24_pos_id":"","crc":"","test_mode":"on"}';
        $config->save();

        $config = new Config();
        $config->name = 'contact_form_email';
        $config->type = 'json';
        $config->value = '{
  "subject": "Zapytanie od czytelnika",
  "email": "example@example.pl",
  "template": "email"
}';
        $config->save();

        $config = new Config();
        $config->name = 'registration_email';
        $config->type = 'json';
        $config->value = '{
  "subject": "Potwierdzenie rejestracji",
  "email": "example@example.pl",
  "template": "registrationEmail",
  "text": "Dziękujemy za rejestrację w naszej bibliotece!\r\n\r\nMożesz teraz rezerwować pozycje poprzez portal. Rezerwacja jest ważna przez 3 dni. Prosimy o zgłoszenie się po odbiór książki w określonym terminie, w przeciwnym wypadku rejestracja będzie anulowana.Pamiętaj, że jednocześnie możesz zarezerwować najwyżej 3 książki.\r\n\r\nW każdej chwili możesz odwołać rezerwację w zakładce \'Aktywne rezerwacje\'.\r\n\r\nTwoje konto nie jest jeszcze zweryfikowane, więc przy realizacji pierwszego zamówienia prosimy mieć przy sobie dowód osobisty, lub inny dokument potwierdzający dane osobowe. Dane zostaną zweryfikowane przez pracownika na miejscu.\r\n\r\nW razie pytan prosimy o kontakt przez formularz lub telefonicznie. Wszystkie dane znajdziesz w zakładce \'kontakt\'."
}';
        $config->save();

        $config = new Config();
        $config->name = 'show_books_only_for_adults';
        $config->type = 'string';
        $config->value = "0";
        $config->save();

        $config = new Config();
        $config->name = 'przelewy24_status';
        $config->type = 'string';
        $config->value = "0";
        $config->save();

        $config = new Config();
        $config->name = 'payments_data';
        $config->type = 'json';
        $config->value = '{"account_number":"5249000051033225454100103","payment_title":"p\u0142atno\u015b\u0107 u\u017cytkownika","receiver":"Moja biblioteka","address":"ul. Testowa 1 00-000 Testowo"}';
        $config->save();

        $config = new Config();
        $config->name = 'delay_cost';
        $config->type = 'string';
        $config->value = "10";
        $config->save();

        $config = new Config();
        $config->name = 'charge_fee';
        $config->type = 'string';
        $config->value = "1";
        $config->save();

        $config = new Config();
        $config->name = 'users_permissions';
        $config->type = 'json';
        $config->value = '{
  "0": {
    "string": "Użytkownik"
  },
  "1": {
    "string": "Pracownik"
  },
  "2": {
    "string": "Administrator"
  }
}';
        $config->save();

        $config = new Config();
        $config->name = 'delay_email';
        $config->type = 'json';
        $config->value = '{
  "subject": "Informacja o opóźnionych wypożyczeniach",
  "email": "test@frustrat-polski.pl",
  "template": "delayEmail",
  "text": "Odnotowaliśmy na twoim koncie wypożyczenia, które nie zostały zwrócone na czas. Każdy dzień opóźnienia zwiększa kwotę opłaty za przetrzymanie pozycji. Aby uniknąć dalszych naliczen prosimy o pilny zwrot pozycji. Wykaz przetrzymanych pozycji oraz kwoty naliczeń dostępny poniżej.\r\n\r\nJednocześnie informujemy, że wpłaty można dokonywać w placówce jak również przez strone biblioteki w panelu użytkownika, w zakładce \'Płatności\'."
}';
        $config->save();

        $config = new Config();
        $config->name = 'reservation_email';
        $config->type = 'json';
        $config->value = '{
  "subject": "Zarezerwowana pozycja",
  "email": "test@frustrat-polski.pl",
  "template": "emails/reservationEmail",
  "text": "Poniższa pozycja została dla Ciebie zarezerwowana.",
"text2": "Będzie czekała na Ciebie w bibliotece do "
}';
        $config->save();
    }
}
