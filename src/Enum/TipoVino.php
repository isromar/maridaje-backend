<?php
// src/Enum/TipoVino.php
namespace App\Enum;

enum TipoVino: string
{
    case Tinto = 'tinto';
    case Rosado = 'rosado';
    case Blanco = 'blanco';
    case Espumoso = 'espumoso';
    case Cava = 'cava';
    case Dulce = 'dulce';
    case Otro = 'otro';
}
