const dom = document.querySelector('section.pokeball')
const canvasHeight = (window.innerHeight/100)*40
const canvasWidth = (window.innerHeight/100)*40
const windowPercent = 40

const pokeball= new Element3d(canvasWidth, canvasHeight,windowPercent, "mtl", './images/model.obj', './images/materials.mtl', 0.1, dom,0, {z:-2},{z:-0.25})


window.addEventListener('resize', ()=>{
    pokeball.resize()
})
//  FUNCTION
let submit = (name)=>{

}

// function for the question
let ask = (question) =>{

}


// EVENTS 

const pokemon_node = document.querySelectorAll('section.content .pokemon:not(.hide)')
for(let i=0; i<pokemon_node.length; i++){
    const buttons = {
        submit: pokemon_node[i].querySelector('.pokemon-buttons .submit'),
        kill: pokemon_node[i].querySelector('.pokemon-buttons .kill'),
    }

    const hide_div = pokemon_node[i].querySelector('.hide')
    const name = pokemon_node[i].dataset.name

    buttons.submit.addEventListener('click', ()=>{
        submit(name)
    })

    buttons.kill.addEventListener('click', ()=>{
        hide_div.classList.toggle('show')
    })

}