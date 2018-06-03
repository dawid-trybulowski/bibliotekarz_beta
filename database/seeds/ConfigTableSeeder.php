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
  }
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
  "text": "Dziękujemy za rejestrację w naszej bibliotece!\r\n\r\nMożesz teraz rezerwować pozycje poprzez portal. Rezerwacja jest ważna przez 3 dni. Prosimy o zgłoszenie się po odbiór książki w określonym terminie, w przeciwnym wypadku rejestracja będzie anulowana.Pamiętaj, że jednocześnie możesz zarezerwować najwyżej 3 książki.\r\n\r\nW każdej chwili możesz odwołać rezerwację w zakładce \'Aktywne rezerwacje\'.\r\n\r\nTwoje konto nie jest jeszcze zweryfikowane, więc przy realizacji pierwszego zamówienia prosimy mieć przy sobie dowód osobisty, lub inny dokument potwierdzający dane osobowe. Dane zostaną zweryfikowane przez pracownika na miejscu.\r\n\r\nW razie pytan prosimy o kontakt przez formularz lub telefonicznie."
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
  },
  "3": {
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

        $config = new Config();
        $config->name = 'regulations';
        $config->type = 'string';
        $config->value = "Regulamin";
        $config->save();

        $config = new Config();
        $config->name = 'privacy_policy';
        $config->type = 'string';
        $config->value = "TEKST PRZYKŁADOWY, EDYTUJ PRZED URUCHOMIENIEM SERWISU
§.1 Postanowienia Ogólne
1. Administratorem danych jest [nazwa firmy] z siedzibą w [miejscowość, adres], wpisanej do Rejestru Przedsiębiorców pod numerem KRS:  [numer], dla której akta rejestrowe prowadzi Sąd [nazwa sądu, miejscowość, nazwa wydziału], Wydział Gospodarczy Krajowego Rejestru Sądowego, NIP: [numer], REGON: [numer]. Ochrona danych odbywa się zgodnie z wymogami powszechnie obowiązujących przepisów prawa, a ich przechowywanie ma miejsce na zabezpieczonych serwerach.
2. Dla interpretacji terminów stosuje się słowniczek Regulaminu lub tak jak zostało to opisane w Polityce Prywatności (jeżeli wynika to bezpośrednio z opisu).
3. Na potrzeby lepszego odbioru Polityki Prywatności termin 'Użytkownik' zastąpiony został określeniem 'Ty',  'Administrator' – 'My'. Termin 'RODO' oznacza Rozporządzenie Parlamentu Europejskiego i Rady (UE) 2016/679 z dnia 27 kwietnia 2016 r. w sprawie ochrony osób fizycznych w związku z przetwarzaniem danych osobowych i w sprawie swobodnego przepływu takich danych oraz uchylenia dyrektywy 95/46/WE.
4. Szanujemy prawo do prywatności i dbamy o bezpieczeństwo danych. W tym celu używany jest m.in. bezpieczny protokół szyfrowania komunikacji (SSL).
5. Dane osobowe podawane w formularzu na landing page’u są traktowane jako poufne i nie są widoczne dla osób nieuprawnionych.
§2. Administrator Danych
1. Usługodawca jest administratorem danych swoich klientów. Oznacza to, że jeśli posiadasz Konto na naszej stronie, to przetwarzamy Twoje dane jak: imię, nazwisko, adres e-mail, adres zamieszkania, data urodzenia, adres IP.
2. Dane osobowe przetwarzane są:a. zgodnie z przepisami dotyczącymi ochrony danych osobowych,b. zgodnie z wdrożoną Polityką Prywatności,c. w zakresie i celu niezbędnym do nawiązania, ukształtowania treści Umowy, zmiany bądź jej rozwiązania oraz prawidłowej realizacji Usług świadczonych drogą elektroniczną, w zakresie i celu niezbędnym do wypełnienia uzasadnionych interesów (prawnie usprawiedliwionych celów), a przetwarzanie nie narusza praw i wolności osoby, której dane dotyczą: w zakresie i celu zgodnym ze zgodą wyrażoną przez Ciebie jeśli [przykładowo] zapisałeś się na newsletter,w zakresie i celu zgodnym z wyrażoną przez Ciebie zgodą jeżeli [przykładowo] zapisałeś się na webinar.
3. Każda osoba, której dane dotyczą (jeżeli jesteśmy ich administratorem) ma prawo dostępu do danych, sprostowania, usunięcia lub ograniczenia przetwarzania, prawo sprzeciwu, prawo wniesienia skargi do organu nadzorczego.
4. Kontakt z osobą nadzorującą przetwarzanie danych osobowych w organizacji Usługodawcy jest możliwy drogą elektroniczną pod adresem e-mail: [adres].
5. Zastrzegamy sobie prawo do przetwarzania Twoich danych po rozwiązaniu Umowy lub cofnięciu zgody tylko w zakresie na potrzeby dochodzenia ewentualnych roszczeń przed sądem lub jeżeli przepisy krajowe albo unijne bądź prawa międzynarodowego obligują nas do retencji danych.
6. Usługodawca ma prawo udostępniać dane osobowe Użytkownika oraz innych jego danych podmiotom upoważnionym na podstawie właściwych przepisów prawa (np. organom ścigania).
7. Usunięcie danych osobowych może nastąpić na skutek cofnięcia zgody bądź wniesienia prawnie dopuszczalnego sprzeciwu na przetwarzanie danych osobowych.
8. Usługodawca nie udostępniania danych osobowych innym podmiotom aniżeli upoważnionym na Wdrożyliśmy pseudonimizację, szyfrowanie danych oraz mamy wprowadzoną kontrolę dostępu dzięki czemu minimalizujemy skutki ewentualnego naruszenia bezpieczeństwa danych.
9. Dane osobowe przetwarzają osoby wyłącznie upoważnione przez nas albo przetwarzający, z którymi ściśle współpracujemy.
§3. Pliki cookies
1. Witryna [adres] używa cookies. Są to niewielkie pliki tekstowe wysyłane przez serwer www i przechowywane przez oprogramowanie komputera przeglądarki. Kiedy przeglądarka ponownie połączy się ze stroną, witryna rozpoznaje rodzaj urządzenia, z którego łączy się użytkownik. Parametry pozwalają na odczytanie informacji w nich zawartych jedynie serwerowi, który je utworzył. Cookies ułatwiają więc korzystanie z wcześniej odwiedzonych witryn.
2. Gromadzone informacje dotyczą adresu IP, typu wykorzystywanej przeglądarki, języka, rodzaju systemu operacyjnego, dostawcy usług internetowych, informacji o czasie i dacie, lokalizacji oraz informacji przesyłanych do witryny za pośrednictwem formularza kontaktowego.
3. Zebrane dane służą do monitorowania i sprawdzenia, w jaki sposób użytkownicy korzystają z naszych witryn, aby usprawniać funkcjonowanie serwisu zapewniając bardziej efektywną i bezproblemową nawigację.
4. Cookies identyfikuje użytkownika, co pozwala na dopasowanie treści witryny, z której korzysta, do jego potrzeb. Zapamiętując jego preferencje, umożliwia odpowiednie dopasowanie skierowanych do niego reklam. Stosujemy pliki cookies, aby zagwarantować najwyższy standard wygody naszego serwisu, a zebrane dane są wykorzystywane jedynie wewnątrz firmy [nazwa] w celu optymalizacji działań.
5. Na naszej witrynie wykorzystujemy następujące pliki cookies [naturalnie trzeba tu dostosować treść do wykorzystywanych przez Ciebie plików]:
1. 'niezbędne' pliki cookies, umożliwiające korzystanie z usług dostępnych w ramach serwisu, np. uwierzytelniające pliki cookies wykorzystywane do usług wymagających uwierzytelniania w ramach serwisu;
2. pliki cookies służące do zapewnienia bezpieczeństwa, np. wykorzystywane do wykrywania nadużyć w zakresie uwierzytelniania w ramach serwisu;
3. 'wydajnościowe' pliki cookies, umożliwiające zbieranie informacji o sposobie korzystania ze stron internetowych serwisu;
4. 'funkcjonalne' pliki cookies, umożliwiające 'zapamiętanie' wybranych przez użytkownika ustawień i personalizację interfejsu użytkownika, np. w zakresie wybranego języka lub regionu, z którego pochodzi użytkownik, rozmiaru czcionki, wyglądu strony internetowej itp.;
6. Użytkownik w każdej chwili ma możliwość wyłączenia lub przywrócenia opcji gromadzenia cookies poprzez zmianę ustawień w przeglądarce internetowej. Instrukcja zarządzania plikami cookies jest dostępna na stronie http://www.allaboutcookies.org/manage-cookies
7. Dodatkowe dane osobowe, jak adres e-mail, zbierane są jedynie w miejscach, w których użytkownik wypełniając formularz wyraźnie wyraził na to zgodę. Powyższe dane zachowujemy i wykorzystujemy tylko do potrzeb niezbędnych do wykonania danej funkcji.";
        $config->save();

        $config = new Config();
        $config->name = 'payments_statuses';
        $config->type = 'json';
        $config->value = '{
  "0": {
    "string": "Nieopłacona"
  },
  "1": {
    "string": "Opłacona"
  }
  }';
        $config->save();


    }
}
