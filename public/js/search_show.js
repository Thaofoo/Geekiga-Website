function show_bar() {
    var x = document.getElementById('search_bar');
    x.classList.toggle("search_hidden");
    x.classList.toggle("search_show");
    setTimeout(()=> {
        x.focus();
     }
     ,410);
  }
