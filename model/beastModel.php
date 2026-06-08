<?php

function insertBeast($conn, $data)
{
    $sql = "INSERT INTO bestiario 
    (bestaNome, bestaPatamar, bestaND, bestaAtaque, bestaDano, bestaDefesa, bestaPV, bestaPericia, bestaCD, bestaCampID)
    VALUES (
        '{$data['nome']}',
        '{$data['patamar']}',
        '{$data['nd']}',
        '{$data['ataque']}',
        '{$data['dano']}',
        '{$data['defesa']}',
        '{$data['pv']}',
        '{$data['pericia']}',
        '{$data['cd']}',
        '{$data['campID']}'
    )";

    return mysqli_query($conn, $sql);
}

function updateBeast($conn, $data)
{
    $sql = "UPDATE bestiario SET
        bestaNome = '{$data['nome']}',
        bestaPatamar = '{$data['patamar']}',
        bestaND = {$data['nd']},
        bestaAtaque = '{$data['ataque']}',
        bestaDano = '{$data['dano']}',
        bestaDefesa = {$data['defesa']},
        bestaPV = {$data['pv']},
        bestaPericia = '{$data['pericia']}',
        bestaCD = {$data['cd']},
        bestaCampID = {$data['campID']}
    WHERE bestaID = {$data['id']}";

    return mysqli_query($conn, $sql);
}


function getBeastsByCamp($conn, $campID)
{
    $sql = "SELECT * FROM bestiario WHERE bestaCampID = $campID";
    return mysqli_query($conn, $sql);
}

function deleteBeast($conn, $id)
{
    $sql = "DELETE FROM bestiario WHERE bestaID = $id";
    return mysqli_query($conn, $sql);
}