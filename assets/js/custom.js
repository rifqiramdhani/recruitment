// sweet alert
$(document).ready(function(){
    const flashdata = $('.flash-data').data('flashdata');

    if( flashdata ){
        Swal.fire({
            title: 'Data buku',
            text: flashdata,
            icon: 'success',
        })
    }
})
