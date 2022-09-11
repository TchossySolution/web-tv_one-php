function alerta() {
  alert('Clicou, homeScript 1')
}

let navbar = document.querySelector('.headerSecondary')

document.querySelector('#menu-btn').onclick = () => {
  navbar.classList.toggle('active')
  document.body.classList.toggle('stop-scrolling')
  searchForm.classList.remove('active')
}
