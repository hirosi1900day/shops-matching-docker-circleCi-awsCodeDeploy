// window.onload = function() {
//   const spinner = document.getElementById('loading');
//   setTimeout(()=>{spinner.classList.add('loaded');}, 2000);
// }
 var webStorage = function(){
  const spinner = document.getElementById('loading');
  const welcomeload=document.getElementById('welcome-load');
  if(sessionStorage.getItem('access')){
    welcomeload.style.visibility = "visible";
    spinner.classList.add('loaded');
    console.log('2kaime');
  }else{
  window.onload = function() {
  spinner.style.visibility = "visible";
  setTimeout(()=>
  {
   spinner.classList.add('loaded');
   welcomeload.style.visibility = "visible";
  }, 3000);
   };
   console.log('1kaime');
    sessionStorage.setItem('access', 0);
  }
};

webStorage();


