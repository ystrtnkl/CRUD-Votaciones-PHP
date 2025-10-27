<?php

    namespace Models;
    //Que tipo de permisos va a tener una encuesta
    enum TipoPermisos {
        case B; //Blacklist
        case N; //Nada
        case W; //Whitelist
    }