const dom = document.querySelector('section.pokeball')
const canvasHeight = (window.innerHeight/100)*40
const canvasWidth = (window.innerHeight/100)*40
const windowPercent = 40

const pokeball= new Element3d(canvasWidth, canvasHeight,windowPercent, "mtl", './images/model.obj', './images/materials.mtl', 0.1, dom,0, {z:-2},{z:-0.25})


window.addEventListener('resize', ()=>{
    pokeball.resize()
})