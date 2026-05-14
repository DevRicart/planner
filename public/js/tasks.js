const descricao = document.getElementById('descricao');
const contador = document.getElementById('contador');

descricao.addEventListener('input', () => {
    contador.textContent = `${descricao.value.length}/100`
});
