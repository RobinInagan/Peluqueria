function eliminar(url) {
    swal.fire({
        title: '¿ Está Seguro ?',
        text: 'No se puede reversar la acción',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#1c6b2a',
        cancelButtonColor: '#800e1d',
        confirmButtonText: 'Si,eliminar registro',
    }).then((result) => {
        if (result.value) {
            window.location = url;
        }
    });
}