# Pagination

---
https://nicolai.maliske.net

### PHP Anwendung
```PHP
$pagination = new Pagination();

$pagination->setCurrentPage(5); // (INT) Aktuelle Seite
$pagination->setTotalEntries(600); // (INT) Anzahl aller einträge (z.B. aus einer Datenbank Tabelle)
$pagination->setEntriesPerPage(25); // (INT) Einträge pro Seite, wie viele Einträge angezeigt werden sollen.

$pagination->getLimits(); // (Return Array) Beispiel: ['current' => 1, 'offset' => 0, 'maxPage' => 25];
$result = $pagination->browse();
```

### browse() Ergebnis
Beispiel: http://localhost/test.php?page=5

```
Array
(
    [prePages] => 3
    [preLinks] => Array
        (
            [2] => 2
            [1] => 3
            [0] => 4
        )

    [nextPages] => 3
    [nextLinks] => Array
        (
            [0] => 6
            [1] => 7
            [2] => 8
        )

    [currentPage] => 5
)
```

### Twig Beispiel für die ausgabe bei "browse()"
```TWIG
<nav aria-label="Page navigation">
    <ul class="pagination">
        {% if totalEntries is defined  %}
            <li class="page-item"><a class="page-link" href="/list/1"><i class='fas fa-angle-double-left'></i>&nbsp;{% trans %}firstPage{% endtrans %}</a></li>
        {% endif %}
        {% for page in pagination.preLinks %}
            <li class="page-item"><a class="page-link" href="/list/{{ page }}">{{ page }}</a></li>
        {% endfor %}
        <li class="page-item active"><a class="page-link" href="/list/{{ pagination.currentPage }}">{{ pagination.currentPage }}</a></li>
        {% for page in pagination.nextLinks %}
            <li class="page-item"><a class="page-link" href="/list/{{ page }}">{{ page }}</a></li>
        {% endfor %}
        {% if totalEntries is defined  %}
        <li class="page-item"><a class="page-link" href="/list/{{ totalEntries }}">{% trans %}lastPage{% endtrans %}&nbsp;<i class='fas fa-angle-double-right'></i></a></li>
        {% endif %}
    </ul>
</nav>
```