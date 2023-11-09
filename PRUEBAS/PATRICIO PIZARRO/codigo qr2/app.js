const contenedorQR = document.getElementById('contenedorQR');
const formulario = document.getElementById('formulario');
const linkInput = formulario.querySelector('#link'); // Obtén el campo de entrada de enlace

const QR = new QRCode(contenedorQR);

// Define la URL que deseas usar para el enlace automático
const enlaceAutomatico = 'https://www.ejemplo.com'; // Reemplaza con la URL que desees

// Rellena automáticamente el campo de entrada de enlace
linkInput.value = enlaceAutomatico;

// Genera el código QR automáticamente al cargar la página
QR.makeCode(enlaceAutomatico);

formulario.addEventListener('submit', (e) => {
	e.preventDefault();
	QR.makeCode(linkInput.value);
});