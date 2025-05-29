document.addEventListener('DOMContenLoaded', ()=>{
	const imgLightBox=document.querySelectorAll('.materialboxed')
	M.Materialbox.init(imgLigthBox,{
		inDuration:500,
		outDuration:500
	});
});