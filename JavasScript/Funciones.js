function eliminar(url) {
    swal.fire({
        title: '¿ Está Seguro ?',
        text: 'No se puede reversar la acción',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#4BC21B',
        cancelButtonColor: '#C21B1B',
        confirmButtonText: 'Si,eliminar registro',
    }).then((result) => {
        if (result.value) {
            window.location = url;
        }
    });
}