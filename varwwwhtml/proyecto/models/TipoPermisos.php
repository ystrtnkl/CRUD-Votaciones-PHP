<?php

    namespace Models;

    enum TipoPermisos {
        case B; //Blacklist
        case N; //Nada
        case W; //Whitelist
    }