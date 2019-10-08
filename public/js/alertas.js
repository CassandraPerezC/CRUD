function alerta(id){
alert(id);
const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: '¿Esta seguro?',
  text: "Esta accion es irreversible!",
  type: 'Precaucion',
  showCancelButton: true,
  confirmButtonText : 'Si eliminar!',
  cancelButtonText: 'No, Eliminar!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
    swalWithBootstrapButtons.fire(
      'Eliminado!',
      'El usuario a sido eliminado.',
      'success'
       )  
       window.location.href = " <?php echo $this->url('crud', ['action' => "delete", 'id' => $user['id']]); ?>  ";
    

  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelado',
      'El usuario no a sido eliminado:)',
      'error'
    )
  }
})}