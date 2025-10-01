try {
    document.getElementById("generar").addEventListener("click", (e) => {
        try {
            document.getElementById("posibleContrasegna").classList.remove("oculto");
        } catch (e) {/*console.log(e)*/}
        let tamagno = 12;
        let esPin = false;
        try {
            tamagno = document.getElementById("tamagnoContrasegna").value;
            esPin = document.getElementById("esPin").checked;
        } catch (e) {/*console.log(e)*/}
        fetch(`/api/nuevaContrasegna?tamagno=${tamagno}${esPin ? "&esPin=true" : ""}`)
        .then(res => res.text())
        .then(data => {
            document.getElementById("contrasegnaGenerada").innerHTML = data;
        });
    });
} catch (e) {/*console.log(e)*/}
try {
    document.getElementById("usarContrasegna").addEventListener("click", (e) => {
        const contrasegna = document.getElementById("contrasegnaGenerada").innerHTML;
        document.getElementById("contrasegna").value = contrasegna;
        document.getElementById("contrasegna2").value = contrasegna;
    });
} catch (e) {/*console.log(e)*/}
