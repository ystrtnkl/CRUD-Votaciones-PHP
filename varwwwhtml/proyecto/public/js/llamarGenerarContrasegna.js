document.getElementById("generar").addEventListener("click", (e) => {
    try {
        document.getElementById("posibleContrasegna").classList.remove("oculto");
    } catch (e) {console.log(e)}
    let tamagno = 12;
    try {
        tamagno = document.getElementById("tamagnoContrasegna").value;
    } catch (e) {console.log(e)}
    fetch("/api/nuevaContrasegna?tamagno=" + tamagno)
    .then(res => res.text())
    .then(data => {
        document.getElementById("contrasegnaGenerada").innerHTML = data;
    });

});
document.getElementById("usarContrasegna").addEventListener("click", (e) => {
    const contrasegna = document.getElementById("contrasegnaGenerada").innerHTML;
    document.getElementById("contrasegna").value = contrasegna;
    document.getElementById("contrasegna2").value = contrasegna;
});