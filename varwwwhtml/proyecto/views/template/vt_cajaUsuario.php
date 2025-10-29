<div class="caja-usuario <?=!isset($esAdmin) ?? $esAdmin === true ? 'caja-admin' : '' ?>">
    <img src="<?=isset($urlFoto) && $urlFoto !== '' ? $urlFoto : 'http://localhost:8081/public/media/nofoto.png'?>" alt="Foto de perfil" class="foto-perfil">
    <h3><?=$nombre ?? "Sin nombre"?></h3>
    <p><?=$correo ?? "Sin correo"?></p>
    <p><?=date('d/m/y', (int)$fechaCreacion ?? '') ?? "Desconocido"?></p>
    <div>
        <a href="<?='#'?>">Borrar</a>
        <a href="<?='#'?>">Editar</a>
    </div>
    <p><?=$uuid ?? ''?></p>
</div>