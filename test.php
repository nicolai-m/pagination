<?php

include_once __DIR__ . '/Pagination.php';

$pagination = new Pagination();

$currentPage = $_GET['page'];

$pagination->setCurrentPage($currentPage); // (INT) Aktuelle Seite
$pagination->setTotalEntries(600); // (INT) Anzahl aller einträge (z.B. aus einer Datenbank Tabelle)
$pagination->setEntriesPerPage(25); // (INT) Einträge pro Seite, wie viele Einträge angezeigt werden sollen.

$pagination->getLimits(); // (Return Array) Beispiel: ['current' => 1, 'offset' => 0, 'maxPage' => 25];
$result = $pagination->browse();

echo '<pre>';
print_r($result);
echo '</pre>';