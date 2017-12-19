@include('top')
@isset ($message)
    <script>Materialize.toast('{{$message}}', 4000)</script>
@endisset
<div id="app">
    @if(Auth::check())
        <topmenulogged></topmenulogged>
    @else
        <topmenu></topmenu>
    @endif
    <userdetails></userdetails>
</div>

@include('top-menu')
@include('top-menu-logged')
@include('user-details')
@include('footer')