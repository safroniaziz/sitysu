const surat = $('#flash-data').data('surat');

if (surat) {
    Swal.fire({
        icon: 'success',
        title: 'Surat',
        text: surat,
    })
}

const keterangan = $('#flash-data').data('keterangan');

if (keterangan) {
    Swal.fire({
        icon: 'success',
        title: 'Surat Keterangan',
        text: keterangan,
    })
}

const user = $('#flash-data').data('user');

if (user) {
    Swal.fire({
        icon: 'success',
        title: 'Data User',
        text: user,
    })
}