<html>
<body>
<div>
    Prosimy o pilny zwrot przetrzymanych pozycji z poniższej listy. Zwrot uchroni Cię przed dalszym naliczaniem opłat;
</div>
<br>
<br>
<div>
    {{$borrow->title . ' ' . $borrow->author . ', opóźnienie(dni) ' . $borrow->delay . ', koszt opóźnienia ' . $borrow->delay_cost}}
</div>
</body>
</html>