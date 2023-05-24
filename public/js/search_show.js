function show_bar() {
    var x = document.getElementById('search_bar');
    x.classList.toggle("search_hidden");
    x.classList.toggle("search_show");
    setTimeout(()=> {
        x.focus();
     }
     ,410);
  }

  document.getElementById('about_us_button').addEventListener("click", show_about)

  function show_about() {
    var x = document.getElementById('about_us');
    x.classList.toggle("about_us_hide");
  }
