const arrow = document.querySelectorAll('.arrow')
const li = document.querySelectorAll('main .content-list .sub-list li')
console.log(li)

let global_toggle = (tab)=>{
    tab.forEach(element => {
        if(element.classList[1] == 'show'){
            element.classList.toggle('show')
        }
    });
}

for(let i=0; i<li.length; i++){
    li[i].addEventListener('click',()=>{
        global_toggle(arrow)
        arrow[i].classList.toggle('show')
    })
}

