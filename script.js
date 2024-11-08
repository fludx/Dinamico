// Selecciona los contenedores de productos
const productGridContainers = document.querySelectorAll('.product-grid-container');

// Función para configurar manejadores de clic en flechas
const setUpArrowClickHandlers = (container) => {
    const rightArrow = container.querySelector('.arrow-container-right');
    const leftArrow = container.querySelector('.arrow-container-left');
    
    rightArrow.addEventListener('click', () => {
        changeGrid(container, 'next');
    });

    leftArrow.addEventListener('click', () => {
        changeGrid(container, 'previous');
    });
};

// Función para cambiar entre grids de productos
const changeGrid = (container, direction) => {
  const currentGrid = container.querySelector('.product-grid[style*="display: flex"]');
  const targetGrid = direction === 'next' ? currentGrid.nextElementSibling : currentGrid.previousElementSibling;

  if (targetGrid) {
      const slideOutClass = direction === 'next' ? 'slide-out-left' : 'slide-out-right';
      const slideInClass = direction === 'next' ? 'slide-in-right' : 'slide-in-left';

      // Deshabilitar los clics en las flechas
      const rightArrow = container.querySelector('.arrow-container-right');
      const leftArrow = container.querySelector('.arrow-container-left');
      rightArrow.disabled = true;
      leftArrow.disabled = true;

      currentGrid.classList.add(slideOutClass);

      setTimeout(() => {
          currentGrid.style.display = 'none';
          targetGrid.style.display = 'flex';
          targetGrid.classList.add(slideInClass);

          // Limpiar clases de animación
          currentGrid.classList.remove(slideOutClass);
          targetGrid.classList.remove(slideInClass);

          // Habilitar los clics nuevamente
          rightArrow.disabled = false;
          leftArrow.disabled = false;
      }, 500); // Debe coincidir con la duración de la animación
  }
};


// Aplicar manejadores a todos los contenedores
productGridContainers.forEach(setUpArrowClickHandlers);

// Manejo del encabezado
const header = document.querySelector('header');

// Función para manejar el desplazamiento
function handleScroll() {
  // Verifica la posición de desplazamiento
  if (window.scrollY > 80) { 
    header.classList.add('fixed') 
  } else {
    header.classList.remove('fixed'); 
  }
}

// Escucha el evento de desplazamiento
window.addEventListener('scroll', handleScroll);