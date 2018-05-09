function showBookDetails(bookId){
    $('#bookDetailsRow_' + bookId).removeAttr('hidden');
    changeArrow(bookId);
}

function changeArrow(arrowId){
    $('#arrow_' + arrowId).removeClass('fa fa-angle-double-down');
    $('#arrow_' + arrowId).addClass('fa fa-angle-double-up');
}

function changeBookToActive