<footer class="footer font-small bg-dark text-white pt-4 mt-4">
    <div class="container-fluid text-center text-md-left">
        <div class="row">
            <div class="col-md-6">
                <h5 class="white-text">{{$compact['config']['library_name']}}</h5>
                <p class="grey-text text-lighten-4">Adres: {{$compact['config']['library_address']}}</p>
                <p class="grey-text text-lighten-4">Telefon: {{$compact['config']['library_phone']}}</p>
                <p class="grey-text text-lighten-4">E-mail: {{$compact['config']['library_email']}}</p>
            </div>
            <div class="col-md-6">
                <h5 class="text-uppercase">Przydatne linki</h5>
                <ul class="list-unstyled">
                    <li><a class="gray-color" href="{{route('show-contact-form')}}">Formularz kontaktowy</a>
                    </li>
                    <li><a class="gray-color" href="http://www.biblioteka.gryfino.pl/Biblioteka/chapter_61075.asp">Strona biblioteki w
                            Gryfinie</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright special-color-dark py-3 text-center">
        <div class="container-fluid">
            Wspierany przez: Bibliotekarz 2018
        </div>
    </div>
</footer>
<script src={{url('/') .'/js/app.js'}}></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script type="text/javascript" src={{url('/') . '/js/bootstrap.min.js' }}></script>
@if(session()->has('message'))
    @include('message-modal')
    @yield('message-modal')
    <script>
        $(document).ready(function () {
            $('#messageModal').modal('show')
        });
    </script>
@endif
@isset($compact['message'])
    @include('message-modal-compact')
    @yield('message-modal-compact')
    <script>
        $(document).ready(function () {
            $('#messageModalCompact').modal('show')
        });
    </script>
@endisset
<script>
    $("#search").click(function (e) {
        $('body').attr('id', 'wrapper');
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    $("#searchHide").click(function (e) {
        $('body').removeAttr('id');
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@if(Auth::check())
    @include('active-reservations-modal')
    @yield('active-reservations-modal')
    @include('active-borrows-modal')
    @yield('active-borrows-modal')
    @include('waiting-list-modal')
    @yield('waiting-list-modal')
    @include('user-dashboard-payments-przelewy24-modal')
    @yield('user-dashboard-payments-przelewy24-modal')
@endif