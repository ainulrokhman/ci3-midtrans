/*!
 * Start Bootstrap - SB Admin v7.0.4 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2021 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
//
// Scripts
//

window.addEventListener("DOMContentLoaded", (event) => {
  // Toggle the side navigation
  const sidebarToggle = document.body.querySelector("#sidebarToggle");
  if (sidebarToggle) {
    // Uncomment Below to persist sidebar toggle between refreshes
    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
    //     document.body.classList.toggle('sb-sidenav-toggled');
    // }
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      );
    });
  }
});

function formatThousands(number) {
  return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function unformatThousands(rupiah) {
  const regex = /-?([\d.,]+)/;
  const matches = rupiah.match(regex);
  if (matches && matches.length > 0) {
    const formattedNumber = matches[0].replace(/[,.]/g, "");
    return parseFloat(formattedNumber);
  }
  return 0;
}
