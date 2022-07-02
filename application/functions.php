<?php

//get User by email
function getUserByID($id, PDO $db, $table)
{
    $SQL = $table === 'students' ? "SELECT * FROM $table WHERE student_no = :id" : "SELECT * FROM $table WHERE professor_no = :id";
    $sth = $db->prepare($SQL);
    $sth->execute(array(
        "id" => $id
    ));
    return $sth->fetch(PDO::FETCH_ASSOC);
}
