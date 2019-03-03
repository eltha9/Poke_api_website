const dom = document.querySelector('section.pokeball')
const canvasHeight = (window.innerHeight/100)*40
const canvasWidth = (window.innerHeight/100)*40
const windowPercent = 40

const pokeball= new Element3d(canvasWidth, canvasHeight,windowPercent, "mtl", './images/model.obj', './images/materials.mtl', 0.1, dom,0, {z:-2},{z:-0.25})


window.addEventListener('resize', ()=>{
    pokeball.resize()
})

// GLOBAL VARRIABLE
const game_id = document.querySelector('main').dataset.gameId

const visual_data={
    question: document.querySelector('.info.question'),
    response: document.querySelector('.info.response'),
}

//  FUNCTION
let submit = (name,id)=>{
    fetch(`./public/check.php?id=${id}&aws=${name}`)
    .then((_response)=>{
        return _response.text()
    })
    .then((response)=>{
        if(response === ''){
            visual_data.response.innerHTML += '<p>Oh bah mince c\'est pas lui =/</p>'
        }else{
            const win_div= document.querySelector('.win')
            let win = new Image
            win.addEventListener('load', ()=>{
                
                win_div.appendChild(win)
                win_div.classList.add('show')
                visual_data.response.innerHTML += '<p>Bravo tu as deviné</p>'
            })
            win.src= `${response}`
            
        }
    })
}

// function for the question
let ask = (question, id) =>{
    fetch(`./public/respons.php?id=${id}&q=${question}`)
    .then((_response)=>{
        return _response.text()
    })
    .then((response)=>{
        visual_data.response.innerHTML += response
    })
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
        submit(name, game_id)
    })

    buttons.kill.addEventListener('click', ()=>{
        hide_div.classList.toggle('show')
    })

}


// question events
const question_buttons = visual_data.question.querySelectorAll('button')

for(let i=0; i< question_buttons.length; i++){
    question_buttons[i].addEventListener('click', ()=>{
        
        ask(question_buttons[i].dataset.targetId, game_id)
    })
}
