<template id="topmenu">
    <div>
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="#!">one</a></li>
            <li><a href="#!">two</a></li>
            <li class="divider"></li>
            <li><a href="#!">three</a></li>
        </ul>
        <nav class="violetNav">
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo">Logo</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="{{ route('register') }}">Rejestracja</a></li>
                    <li><a href="{{ route('login') }}">Logowanie</a></li>
                </ul>
            </div>
        </nav>
    </div>
</template>