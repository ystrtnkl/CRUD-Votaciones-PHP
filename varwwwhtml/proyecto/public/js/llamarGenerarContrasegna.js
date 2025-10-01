document.getElementById("generar").addEventListener("click", (e) => {
    document.getElementById("posibleContrasegna").classList.remove("oculto");
});
document.getElementById("usarContrasegna").addEventListener("click", (e) => {
    const contrasegna = document.getElementById("contrasegnaGenerada").innerHTML;
    document.getElementById("contrasegna").value = contrasegna;
    document.getElementById("contrasegna2").value = contrasegna;
});