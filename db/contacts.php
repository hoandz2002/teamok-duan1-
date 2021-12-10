<?php
function getAllContact()
{
    $conn = connect();
    $sql = "SELECT * FROM contacts";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_contacts' => $data['id_contacts'],
            'email_contacts' => $data['email_contacts'],
            'mess_contacts' => $data['mess_contacts'],
            'date_contacts' => $data['date_contacts'],
            'status_contacts' => $data['status_contacts'],
        ];
        array_push($result, $row);
    }
    return $result;
}


function getIdContact($id)
{
    $conn = connect();
    $sql = "SELECT * FROM contacts";
    $statement = $conn->prepare($sql);
    $statement->execute(['id_contacts' => $id]);

    $data = $statement->fetch();

    $row = [
        'id_contacts' => $data['id_contacts'],
        'email_contacts' => $data['email_contacts'],
        'mess_contacts' => $data['mess_contacts'],
        'date_contacts' => $data['date_contacts'],
        'status_contacts' => $data['status_contacts'],
    ];

    return $row;
}
function insert_contacts(array $data)
{
    $conn = connect();
    $sql = "INSERT INTO contacts( email_contacts, mess_contacts, date_contacts, status_contacts)" .
    "VALUES( :email_contacts, :mess_contacts, :date_contacts, 0)";
    $statement = $conn->prepare($sql);
    $statement->execute($data);
}
function update_contacts($data)
{
    $conn = connect();
    $sql = "UPDATE contacts SET status_contacts =:status_contacts  WHERE id_contacts = :id_contacts";
    $statement = $conn->prepare($sql);
    $statement->execute($data);
    return true;
}

function delete_contacts($id)
{
    $conn = connect();
    $sql = "DELETE FROM contacts WHERE id_contacts = :id_contacts";
    $statement = $conn->prepare($sql);
    $statement->execute(['id_contacts' => $id]);
}
