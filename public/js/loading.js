window.onload = function() {
  const spinner = document.getElementById('loading');
  setTimeout(()=>{spinner.classList.add('loaded');}, 2000);
}