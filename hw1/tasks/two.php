<?php
/**
 * Created by PhpStorm.
 * User: Nikita Zimin
 * Date: 14.01.2022
 * Time: 20:30
 */

const TOTAL_DRAWINGS = 80;
const PEN_DRAWINGS = 23;
const PENCIL_DRAWINGS = 40;

$paintDrawings = TOTAL_DRAWINGS - PEN_DRAWINGS - PENCIL_DRAWINGS;
echo("Красками выполнено $paintDrawings рисунков\n");
