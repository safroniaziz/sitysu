const tugas = $('#flash-data').data('tugas');

if (tugas) {
    Swal.fire({
        icon: 'success',
        title: 'Surat Tugas',
        text: tugas,
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