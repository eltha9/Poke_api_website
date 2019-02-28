const arrow = document.querySelectorAll('.arrow')
const li = document.querySelectorAll('main .content-list .sub-list li')


let global_toggle = (tab)=>{
    tab.forEach(element => {
        if(element.classList[1] == 'show'){
            element.classList.toggle('show')
        }
    });
}


const main_form = document.querySelector('.content-form')
const form_node = {
    numerique_mode : {
        node: main_form.querySelector('.mode-numerique-content'),
        ol: main_form.querySelector('.mode-numerique-content ol')
    }
}




// VARIABLE DE FORMULAIRE
let offset = 0



// FORMULAIRE SCRIPT

let numerique_mode = (offset)=>{
    let data
    data = fetch(`./public/listing.php?offset=${offset}`)
    .then((_response)=>{

        return _response.text()
    })
    .then((response)=>{ 
        form_node.numerique_mode.ol.innerHTML += response    
        
    })
}







// CRÉATION DES EVENT SUR LES <li>

for(let i=0; i<li.length; i++){
    li[i].addEventListener('click',()=>{
        global_toggle(arrow)
        arrow[i].classList.toggle('show')
        
        numerique_mode(offset)
        
        form_node.numerique_mode.node.classList.toggle('show')
    })
}



// test part
// let last = 0
// window.addEventListener('wheel',(event)=>{
//     const rect = form_node.numerique_mode.node.getBoundingClientRect()
//     if(last === rect.bottom){
//         numerique_mode(offset)
//         offset += 30
//     }else{
//         last = rect.bottom
//     }

// })