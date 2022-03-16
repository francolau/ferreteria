
function Chequear(){
    var all = document.form.all.checked;
    for (var i=0; i<document.form.test.length; i++){
      document.form.test[i].checked = all;
    }
  }