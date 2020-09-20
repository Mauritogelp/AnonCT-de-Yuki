var alerta = new Vue({
	methods:{
		correcto:function(mensaje){
			const Toast = Swal.mixin({
			  toast: true,
			  position: 'top-end',
			  showConfirmButton: false,
			  timer: 5000,
			  timerProgressBar: true,
			  onOpen: (toast) => {
			    toast.addEventListener('mouseenter', Swal.stopTimer)
			    toast.addEventListener('mouseleave', Swal.resumeTimer)
			  }
			})

			Toast.fire({
			  icon: 'success',
			  title: mensaje
			})
		},
		error:function(mensaje){
			const Toast = Swal.mixin({
			  toast: true,
			  position: 'top-end',
			  showConfirmButton: false,
			  timer: 5000,
			  timerProgressBar: true,
			  onOpen: (toast) => {
			    toast.addEventListener('mouseenter', Swal.stopTimer)
			    toast.addEventListener('mouseleave', Swal.resumeTimer)
			  }
			})

			Toast.fire({
			  icon: 'error',
			  title: mensaje
			})
		},
		cuidado:function(mensaje){
			const Toast = Swal.mixin({
			  toast: true,
			  position: 'top-end',
			  showConfirmButton: false,
			  timer: 5000,
			  timerProgressBar: true,
			  onOpen: (toast) => {
			    toast.addEventListener('mouseenter', Swal.stopTimer)
			    toast.addEventListener('mouseleave', Swal.resumeTimer)
			  }
			})

			Toast.fire({
			  icon: 'warning',
			  title: mensaje
			})
		}
	}
})