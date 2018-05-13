@include('admin/top')
<div class="col s9" style="color:#fff">
    <h3>Szablony E-mail</h3>
</div>
</div>
</div>
<div id="app">
    <div class="row" style="margin:0">
        <div class="col s12">
            <h4>Potwierdzenie rejestracji</h4>
        </div>

        <form class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <input id="registrationonfirmationTheme" type="text" class="validate" value="" name="registrationonfirmationTheme">
                    <label for="registrationonfirmationTheme">Temat</label>
                </div>
                <div class="input-field col s12">
                    <textarea id="registrationConfirmationContent" class="materialize-textarea" name="registrationConfirmationContent"></textarea>
                    <label for="registrationConfirmationContent">Treść wiadomości</label>
                </div>
            </div>
        </form>
    </div>

    <div class="row" style="margin:0">
        <div class="col s12">
            <h4>Potwierdzenie wypożyczenia</h4>
        </div>

        <form class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <input id="borrowConfirmationTheme" type="text" class="validate" value="" name="borrowConfirmationTheme">
                    <label for="borrowConfirmationTheme">Temat</label>
                </div>
                <div class="input-field col s12">
                    <textarea id="borrowConfirmationContent" class="materialize-textarea" name="borrowConfirmationContent"></textarea>
                    <label for="borrowConfirmationContent">Treść wiadomości</label>
                </div>
            </div>
        </form>
    </div>

    <div class="row" style="margin:0">
        <div class="col s12">
            <h4>Ponaglenie do zwrotu</h4>
        </div>

        <form class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <input id="reminderTheme" type="text" class="validate" value="" name="reminderTheme">
                    <label for="reminderTheme">Temat</label>
                </div>
                <div class="input-field col s12">
                    <textarea id="reminderContent" class="materialize-textarea" name="reminderContent"></textarea>
                    <label for="reminderContent">Treść wiadomości</label>
                </div>
            </div>
        </form>
    </div>
</div>

<main>

@include('admin/footer')

    <script>
        $('#textarea1').val('');
    </script>