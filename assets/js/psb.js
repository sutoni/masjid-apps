$(document).ready(function () {

    /**
     * Modal confirmation untuk link.
     */
    $('a[data-confirm]').click(function() {
        var href = $(this).attr('href');
        if (!$('#dataConfirmModal').length) {
            $('body').append(
                '<div class="modal fade" id="dataConfirmModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">' +
                    '<div class="modal-dialog">' +
                        '<div class="modal-content">' +
                            '<div class="modal-header">' +
                                '<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>' +
                                '<h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>' +
                            '</div>' +

                            '<div class="modal-body"></div>' +

                            '<div class="modal-footer">' +
                                '<button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>' +
                                '<a class="btn btn-primary" id="dataConfirmOK">Ya</a>' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                '</div>'
            );
        }
        $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
        $('#dataConfirmOK').attr('href', href);
        $('#dataConfirmModal').modal({show: true});
        return false;
    });

    /**
     * Modal confirmation untuk form submit.
     */
     $('button[data-confirm]').click(function() {
        if (!$('#dataConfirmModal').length) {
            $('body').append(
                '<div class="modal fade" id="dataConfirmModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">' +
                    '<div class="modal-dialog">' +
                        '<div class="modal-content">' +
                            '<div class="modal-header">' +
                                '<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>' +
                                '<h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>' +
                            '</div>' +

                            '<div class="modal-body"></div>' +

                            '<div class="modal-footer">' +
                                '<button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>' +
                                '<button type="submit" class="btn btn-primary" id="dataConfirmOK">Ya</button>' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                '</div>'
            );
        }
        $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
        $('#dataConfirmModal').modal({show: true});

        // Jika tombol submit di-klik.
        $("#dataConfirmOK").click(function () {
            $("#myform").submit();
        });
        return false;
    });

    /**
     * Date picker.
     */
    // Tanggal Lahir.
    $('#tanggal_lahir').datepicker({
        format: "dd-mm-yyyy",
        autoclose: true,
        todayHighlight:true,
        startView:'decade'
    });

    // Tahun Lulus.
    $('#ska_tahun_lulus').datepicker({
        format: "yyyy",
        autoclose: true,
        minViewMode:'years'
    });


    /**
     * Tiny MCE
     */
    tinymce.init({
        selector: "textarea.mytextarea",
        resize: false
    });

});