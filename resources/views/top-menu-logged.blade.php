<template id="topmenulogged">
    @if(Auth::check())
    <div>
        <nav class="violetNav">
            <div class="nav-wrapper">
                <a class="brand-logo"><img src="{{asset('img/logo.png')}}" style="height:64px"></a>
                <ul class="right hide-on-med-and-down">
                    <li><i class="material-icons" @click="showSearchFunction()">search</i></li>
                    <li><a href="{{ route('logout') }}">Wyloguj</a></li>
                    <li><a href="dashboard">{{Auth::user()->email}}</a></li>
                </ul>
            </div>
        </nav>
        <nav class="violetNav" v-show="showSearch == true">
            <div class="nav-wrapper">
                <form action="search" method="get">
                    <div class="input-field">
                        <input id="search" type="search" name="search" required>
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                    </div>
                </form>
            </div>
        </nav>
    </div>
    @endif
</template>