function limpiar() {
    document.form.reset();
}

function eliminar(url) {
    swal.fire({
        title: '¿ Está Seguro ?',
        text: 'No se puede reversar la acción',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#1c6b2a',
        cancelButtonColor: '#800e1d',
        confirmButtonText: 'Si,eliminar registro',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    }).then((result) => {
        if (result.value) {
            window.location = url;
        }
    });
}

function verificar(sesion, rol) {
    console.log(sesion);
    if (sesion != 0 && rol != 0) {
        if (rol == 1 || rol == 3) {
            Swal.fire({
                title: 'warning',
                text: 'Tu rol no te permite reservar citas. Por favor dirígete a tu apartado de gestión de citas',
                icon: 'warning',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            }).then((result) => {
                if (result.value) {
                    window.location = './Home.php';
                }
            });
        }
        if (rol == 2) {
            window.location = './citas/citaclientes.php';
        }
    } else {
        window.location = './Login.php';
    }
}