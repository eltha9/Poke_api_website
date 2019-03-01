const arrow = document.querySelectorAll('.arrow')
const li = document.querySelectorAll('main .content-list .sub-list li')
const forms = document.querySelectorAll('.content-form .form')

// varriable of each type of search button
const numerique = document.querySelector('.mode-numerique')
const habitats = document.querySelectorAll('.habitats li')
const search = document.querySelector('.search')
const type = document.querySelector('.type')

// varriable of the node who show the results
const main_form = document.querySelector('.content-form')
const form_node = {
    numerique_mode : {
        node: main_form.querySelector('.mode-numerique-content'),
        ol: main_form.querySelector('.mode-numerique-content ol')
    },
    habitat: {
        node: main_form.querySelector('.mode-habitats-content'),
        ol: main_form.querySelector('.mode-habitats-content ol')
    },
    search: {
        node: main_form.querySelector('.mode-search-content'),
        ol: main_form.querySelector('.mode-search-content ul'),
        input: main_form.querySelector('.mode-search-content input')
    },
    type: {
        node: main_form.querySelector('.mode-type-content'),
        ol: main_form.querySelector('.mode-type-content ol'),
        button : main_form.querySelector('.mode-type-content button'),
        select : main_form.querySelector('.mode-type-content select')
    },
}




// style function
let global_toggle = (tab, param)=>{
    tab.forEach(element => {
        if(element.classList[param] == 'show'){
            element.classList.toggle('show')
        }
    });
}



// VARIABLE DE FORMULAIRE
let offset = 0



// FORMULAIRE SCRIPT

let numerique_mode = (offset)=>{
    fetch(`./public/listing.php?offset=${offset}`)
    .then((_response)=>{

        return _response.text()
    })
    .then((response)=>{ 
        form_node.numerique_mode.ol.innerHTML += response    
        
    })
}


let habitat_mode = (habitat)=>{
    fetch(`./public/searchs.php?habitat=${habitat}`)
    .then((_response)=>{

        return _response.text()
    })
    .then((response)=>{ 
        form_node.habitat.ol.innerHTML = response    
        
    })
}

let search_mode= (key)=>{
    fetch(`./public/searchs.php?search=${key}`)
    .then((_response)=>{

        return _response.text()
    })
    .then((response)=>{ 
        form_node.search.ol.innerHTML = response    
        
    })
}

let type_mode= (key)=>{
    fetch(`./public/searchs.php?type=${key}`)
    .then((_response)=>{

        return _response.text()
    })
    .then((response)=>{ 
        form_node.type.ol.innerHTML = response    
        
    })
}

// EVENTS ON <li>

//numerique events
numerique.addEventListener('click',()=>{
    global_toggle(arrow, 1)
    arrow[0].classList.toggle('show')
    
    numerique_mode(offset)
    global_toggle(forms, 2)
    form_node.numerique_mode.node.classList.toggle('show')
})

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



//habitats events
for(let i=0; i<habitats.length; i++){
    habitats[i].addEventListener('click', ()=>{
        global_toggle(arrow, 1)
        arrow[1+i].classList.toggle('show')
        
        habitat_mode(habitats[i].dataset.type)
        global_toggle(forms, 2)
        form_node.habitat.node.classList.toggle('show')
    })
}

//search events
search.addEventListener('click',()=>{
    global_toggle(arrow, 1)
    arrow[10].classList.toggle('show')

    global_toggle(forms, 2)
    form_node.search.node.classList.toggle('show')
    
})

form_node.search.input.addEventListener('keyup',()=>{
    
    let search_key = form_node.search.input.value
    if(search_key != ''){
        search_mode(search_key)
    }
})

//type events
type.addEventListener('click',()=>{
    global_toggle(arrow, 1)
    arrow[11].classList.toggle('show')
    
    global_toggle(forms, 2)
    form_node.type.node.classList.toggle('show')
})

form_node.type.button.addEventListener('click', ()=>{
    let key = form_node.type.select.value
    if(key != ''){
        type_mode(key)
    }

})
