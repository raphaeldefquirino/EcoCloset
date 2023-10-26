const order = document.querySelector(".order");
const animationDuration = 8400; // Duração da animação em milissegundos
const intervalBetweenAnimations = 10; // Intervalo entre animações em milissegundos

function handleOrderAnimation() {
  if (!order.classList.contains("animate")) {
    order.classList.add("animate");
    setTimeout(function() {
      order.classList.remove("animate");
      // Adicione este trecho para reiniciar a animação após um intervalo específico
      setTimeout(function() {
        handleOrderAnimation();
      }, intervalBetweenAnimations);
    }, animationDuration);
  }
}

function init() {
  // Chame handleOrderAnimation diretamente ao iniciar a página
  handleOrderAnimation();
}

init();
