<template id="topmenulogged">
    @if(Auth::check())
    <div>
        <nav class="violetNav">
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo">Logo</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="dashboard">{{Auth::user()->email}}</a></li>
                </ul>
            </div>
        </nav>
    </div>
    @endif
</template>