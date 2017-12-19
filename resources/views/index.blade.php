@include('top')
<div id="app">
    @if(Auth::check())
        <topmenulogged></topmenulogged>
    @else
        <topmenu></topmenu>
    @endif
    <books :books='{{json_encode($refactoredBooks)}}'></books>
    @if (Session::has('message'))
        <script>Materialize.toast('{{Session::get('message')}}', 4000)</script>
    @endif
    @isset ($message)
        <script>Materialize.toast('{{$message}}', 4000)</script>
    @endisset
</div>
@include('books')
@include('top-menu')
@include('top-menu-logged')
@include('footer')
