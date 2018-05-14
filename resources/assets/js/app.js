/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue/dist/vue.js'
import books from './components/Books.vue'
import topmenu from './components/Topmenu.vue'
import topmenulogged from './components/Topmenulogged.vue'
import userdetails from './components/Userdetails.vue'
import userdashboardloginedit from './components/Userdashboardloginedit.vue'

window.Vue = Vue;
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({
    el: '#app',
    data: function () {
        return {
            showDetailsProp: []
        }
    },
    methods: {
        setBooks: function (books) {
            var self = this;
            $.each(books, function (key, value) {
                Vue.set(self.showDetailsProp, value.id, false);
            });
        },
        showDetailsFunction: function (id) {
            var self = this;
            console.log('#bookDetailsRow_' + id);
            if ($('#bookDetailsRow_' + id).is(":visible")) {
                $('#bookDetailsRow_' + id).slideToggle(function () {
                    $('#arrow_' + id).removeClass('fa-angle-double-up');
                    $('#arrow_' + id).addClass('fa-angle-double-down');
                    $('#bookItem_' + id).removeClass('active');
                });
            } else {
                $('#bookItem_' + id).addClass('active');
                $('#arrow_' + id).removeClass('fa-angle-double-down');
                $('#arrow_' + id).addClass('fa-angle-double-up');
                $('#bookDetailsRow_' + id).slideToggle(function () {

                });
            }
        },
        showActiveReservationsModal: function () {
            console.log('tutaj');
            $('#activeReservationsModal').modal('show')
        },
        showPrzelewy24PaymentsModal: function () {
            $('#przelewy24PaymentsModal').modal('show');
        },
        showCommuniquesModal: function () {
            $('#communiquesModal').modal('show');
        },
        showAddCommuniqueModal: function () {
            $('#addCommuniqueModal').modal('show');
        },
        showPaymentsDataModal: function () {
            $('#paymentsDataModal').modal('show');
        },
        showBorrowForUserModal: function (bookId) {
            $('#bookId').val(bookId);
            $('#borrowForUserModal').modal('show');
        },
        changePhotoFunction:function(){
            $('#photoDiv').toggle();
            $('#imgDiv').toggle();
        }
    }
});

var menu = new Vue({
    el: '#menu',
    data: function () {
        return {
            activeReservationsLoaded: false,
            activeBorrowsLoaded: false,
            waitingListLoaded: false,
            changePhoto:false
        }
    },
    methods: {
        showActiveReservationsModal: function () {
            $.post("activeReservationsByUser", function (data) {
                $('#activeReservationsThead').empty();
                $('#activeReservationsTbody').empty();
                var self = this;
                if (data.length > 0) {
                    var mainRow = '<tr>' +
                        '<th class="numeric">ID</th>' +
                        '<th class="numeric">Tytuł</th>' +
                        '<th class="numeric">Autor</th>' +
                        '<th class="numeric">Data rozpoczęcia</th>' +
                        '<th class="numeric">Data zakonczenia</th>' +
                        '<th class="numeric">Akcje</th>' +
                        '</tr>';
                    $('#activeReservationsThead').append(mainRow);
                    $.each(data, function (key, reservation) {
                        console.log(reservation);
                        var row = '<tr>' +
                            '<td data-title="ID">' + reservation.id + '</td>' +
                            '<td data-title="Tytuł">' + reservation.title + '</td>' +
                            '<td data-title="Autor" class="numeric">' + reservation.author + '</td>' +
                            '<td data-title="Rozpoczęcie" class="numeric">' + reservation.reservation_date_start + '</td>' +
                            '<td data-title="Zakończenie" class="numeric">' + reservation.reservation_date_end + '</td>' +
                            '<td data-title="Akcje" class="numeric"><a href="cancelReservation/' + reservation.id + '"><button type="button" class="btn btn-danger btn-sm">Anuluj</button></a></td>' +
                            '</tr>';
                        $('#activeReservationsTbody').append(row);
                    });
                }
                else {
                    $('#activeReservationsTable').append('Brak aktywnych rezerwacji');
                }
                $('.loaderReservations').remove();
                self.activeReservationsLoaded = true;
            });
            $('#activeReservationsModal').modal('show')
        },
        showActiveBorrowsModal: function () {
            $.post("activeBorrowsByUser", function (data) {
                $('#activeBorrowsThead').empty();
                $('#activeBorrowsTbody').empty();
                if (data.length > 0) {
                    var mainRow = '<tr>' +
                        '<th class="numeric">ID</th>' +
                        '<th class="numeric">Tytuł</th>' +
                        '<th class="numeric">Autor</th>' +
                        '<th class="numeric">Data rozpoczęcia</th>' +
                        '<th class="numeric">Data zakończenia</th>' +
                        '<th class="numeric">Akcje</th>' +
                        '</tr>';
                    $('#activeBorrowsThead').append(mainRow);
                    $.each(data, function (key, borrow) {
                        console.log(borrow);
                        var row = '<tr>' +
                            '<td data-title="ID" class="numeric text-center">' + borrow.id + '</td>' +
                            '<td data-title="Tytuł" class="numeric text-center">' + borrow.title + '</td>' +
                            '<td data-title="Autor" class="numeric text-center">' + borrow.author + '</td>' +
                            '<td data-title="Rozpoczęcie" class="numeric text-center">' + borrow.borrow_date_start + '</td>' +
                            '<td data-title="Zakończenie" class="numeric text-center">' + borrow.borrow_date_end + '</td>' +
                            '<td data-title="Akcje" class="numeric text-center"><a href="extendBorrow/' + borrow.id + '"><button type="button" class="btn btn-danger btn-sm">Przedłuż</button></a></td>' +
                            '</tr>';
                        $('#activeBorrowsTbody').append(row);
                    });
                }
                else {
                    $('#activeBorrowsTable').append('Brak aktywnych wypożyczeń');
                }
            });
            $('#activeBorrowsModal').modal('show')
            $('.loaderBorrows').remove();
            self.activeBorrowsLoaded = true;
        },
        showWaitingListModal: function () {
            $.post("waitingListByUser", function (data) {
                $('#waitingListThead').empty();
                $('#waitingListTbody').empty();
                if (data.length > 0) {
                    var mainRow = '<tr>' +
                        '<th class="numeric">ID</th>' +
                        '<th class="numeric">Tytuł</th>' +
                        '<th class="numeric">Autor</th>' +
                        '<th class="numeric">Data rozpoczęcia</th>' +
                        '<th class="numeric">Pozycja w kolejce</th>' +
                        '<th class="numeric">Akcje</th>' +
                        '</tr>';
                    $('#waitingListThead').append(mainRow);
                    $.each(data, function (key, waitingListElement) {
                        console.log(waitingListElement);
                        var row = '<tr>' +
                            '<td data-title="ID">' + waitingListElement.id + '</td>' +
                            '<td data-title="Tytuł">' + waitingListElement.title + '</td>' +
                            '<td data-title="Autor" class="numeric">' + waitingListElement.author + '</td>' +
                            '<td data-title="Rozpoczęcie" class="numeric">' + waitingListElement.created_at + '</td>' +
                            '<td data-title="Pozycja w kolejce" class="numeric">' + waitingListElement.position + '</td>' +
                            '<td data-title="Akcje" class="numeric"><a href="cancelWaitingListElement/' + waitingListElement.id + '"><button type="button" class="btn btn-danger btn-sm">Anuluj</button></a></td>' +
                            '</tr>';
                        $('#waitingListTbody').append(row);
                    });
                }
                else {
                    $('#waitingListTable').append('Brak aktywnych wypożyczeń');
                }


                // $('#waitingListContainer').empty();
                // var mainRow = '<div class="row col-12 mt-1 border centered_new text-center bg-secondary text-white" >' +
                //     '<div class="col-4">Tytuł</div>' +
                //     '<div class="col-3">Autor</div>' +
                //     '<div class="col-2">Data rozpoczęcia</div>' +
                //     '<div class="col-2">Pozycja w kolejce</div>' +
                //     '<div class="col-1"></div>' +
                //     '</div>';
                // $('#waitingListContainer').append(mainRow);
                // var self = this;
                // $.each(data, function (key, waitingListElement) {
                //     var row = '<div class="col-12 mt-1"><div class="row col-12 border centered_new text-center" >' +
                //         '<div class="col-4">' + waitingListElement.title + '</div>' +
                //         '<div class="col-3">' + waitingListElement.author + '</div>' +
                //         '<div class="col-2">' + waitingListElement.created_at + '</div>' +
                //         '<div class="col-2">' + waitingListElement.position + '</div>' +
                //         '<div class="col-1 centered_new"><a href="cancelWaitingListElement/' + waitingListElement.id + '"><button type="button" class="btn btn-danger btn-sm">Anuluj</button></a></div></div></div>';
                //     $('#waitingListContainer').append(row)
                // });
            });
            $('#waitingListModal').modal('show');
            $('.loaderWaitingList').remove();
            self.waitingListLoaded = true;
        }
    }
});


