function del(id,name,url,text,page,stt){
    Swal.fire({
      title: 'Delete',
      text: "Do yo want delete? "+text+ ""+name+"?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href= ''+url+id+"/"+page+"/"+stt+'';
      }
    });
  }

  function logout(url){
    Swal.fire({
      title: 'Do yo want to log out?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href= ''+url+'';
      }
    });
  }

