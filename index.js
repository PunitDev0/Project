
// let additem = document.querySelector('.additem');
let form  = document.querySelector('.form2');
let additem = document.querySelector('.additem');

additem.addEventListener('click', () => {
   
    form.classList.toggle('hidden')
    console.log("hello");
    if (form.classList.contains('hidden')) {
        document.body.style.overflow = 'auto';
        additem.innerHTML = 'Add-More!';

      } else {
        document.body.style.overflow = 'hidden';
        additem.innerHTML = 'Back';
      }
})
if(form){
    document.querySelector('body').style.overflow = 'hidden'
    
}