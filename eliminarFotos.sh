#!/bin/bash
cd .
rm -rf ./varwwwhtml/proyecto/public/files/fotosPerfil/*
rm -rf ./varwwwhtml/proyecto/public/files/portadasEncuestas/*
rm -rf ./varwwwhtml/proyecto/files/*
mkdir ./varwwwhtml/proyecto/files/
mkdir ./varwwwhtml/proyecto/public/files/portadasEncuestas/
mkdir ./varwwwhtml/proyecto/public/files/fotosPerfil/
touch ./varwwwhtml/proyecto/files/.gitinclude
touch ./varwwwhtml/proyecto/public/files/portadasEncuestas/.gitinclude
touch ./varwwwhtml/proyecto/public/files/fotosPerfil/.gitinclude
