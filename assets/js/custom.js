//function swall alert hapus data
function hapusdata(title, url, id, nama) {
    Swal.fire({
        title: 'Apakah yakin?',
        text: "Ingin Menghapus Data " + nama,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#db3325',
        cancelButtonColor: '#f5a732',
        confirmButtonText: "Hapus",
        cancelButtonText: "Cancel",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url + id,
                type: 'DELETE',
                error: function (xhr, textStatus, error) {
                    console.log(xhr.responseText);
                    console.log(xhr.statusText);
                    console.log(textStatus);
                    console.log(error);
                },
                success: function (data) {
                    $("#" + id).remove();
                    Swal.fire({
                        title: title,
                        text: 'Data Berhasil Dihapus!',
                        icon: 'success'
                    })
                }
            });
        }
    })
}
