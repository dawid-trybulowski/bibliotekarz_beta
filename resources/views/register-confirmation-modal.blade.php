<div id="registerConfirmationModal" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h5>Potwierdzenie rejestracji {{Auth::user()->email}}</h5>
        </br>
        Dziękujemy za rejestrację w naszej bibliotece!
        </br></br>
        Możesz teraz rezerwować pozycje poprzez portal. Rezerwacja jest ważna przez 3 dni. Prosimy o
        zgłoszenie się po odbiór książki w określonym terminie, w przeciwnym wypadku rejestracja będzie anulowana.
        </br></br>
        Pamiętaj, że jednocześnie możesz zarezerwować najwyżej 3 książki. W każdej chwili możesz odwołać rezerwację w
        zakładce "Aktywne rezerwacje".
        </br></br>
        Twoje konto nie jest jeszcze zweryfikowane, więc przy realizacji pierwszego zamówienia prosimy mieć przy sobie
        dowód osobisty, lub inny dokument potwierdzający dane osobowe. Dane zostaną zweryfikowane przez pracownika na
        miejscu
        </br></br>
        W razie pytan prosimy o kontakt przez formularz lub telefonicznie. Wszystkie dane znajdziesz w zakładce
        "kontakt"
        </br></br>
        <p style="text-align:right">Pozdrawiamy,
            </br>
            Pracownicy Biblioteki Publicznej w Gryfinie</p>

    </div>
    <div class="modal-footer">
        <a onclick="$('#registerConfirmationModal').modal('close')"
           class="modal-action modal-close waves-effect waves-green btn-flat ">Zamknij</a>
    </div>
</div>