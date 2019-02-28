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
        console.log(form_node.numerique_mode.ol)   
        form_node.numerique_mode.ol.innerHTML += response    

        // form_node.numerique_mode.ol = main_form.querySelector('.mode-numerique-content ol')
        // console.log(form_node.numerique_mode.ol)
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