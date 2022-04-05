const flashData = $('.flash-data').data('flashdata');
console.log(flashData);

if(flashData)
{
	Swal.fire({
		title: ' Success! ',
		text: 'Data Berhasil ' + flashData,
		icon: 'success'
	});
}


const flashErorr = $('.flash-data').data('flasherorr');
console.log(flashErorr);

if(flashErorr)
{
	Swal.fire({
		title: ' Warning ! ',
		text: 'Pastikan ' + flashErorr,
		icon: 'error'
	});
}




//tombol hapus
$('.tombol-hapus').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Apakah anda yakin?',
	  text: "Data ini akan dihapus?",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus Data!'
	}).then((result) => {
	  if (result.isConfirmed) {
	    /*Swal.fire(*/
	    	document.location.href = href;
	      /*'Deleted!',
	      'Your file has been deleted.',
	      'success'*/
	    /*)*/
	  }
	})
});

//tombol verifikasi
// $('.tombol-verif').on('click', function (e) {

// 	e.preventDefault();
// 	const href = $(this).attr('href');

// 	Swal.fire({
// 	  title: 'Apakah anda yakin?',
// 	  text: "Data ini akan dihapus?",
// 	  icon: 'warning',
// 	  showCancelButton: true,
// 	  confirmButtonColor: '#3085d6',
// 	  cancelButtonColor: '#d33',
// 	  confirmButtonText: 'Hapus Data!'
// 	}).then((result) => {
// 	  if (result.isConfirmed) {
// 	    /*Swal.fire(*/
// 	    	document.location.href = href;
// 	      /*'Deleted!',
// 	      'Your file has been deleted.',
// 	      'success'*/
// 	    /*)*/
// 	  }
// 	})


// });