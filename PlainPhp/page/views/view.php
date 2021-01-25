<?php
    if($_GET['viewnr'] === "1") {
        $viewEntries = $this->db['bs']->view1();
    } else if($_GET['viewnr'] === "2") {
        $viewEntries = $this->db['bs']->view2();
    } else if($_GET['viewnr'] === "3") {
        $viewEntries = $this->db['bs']->view3();
    }


    $columns = array_keys($viewEntries[0]);
?>

<div class="card" id="search-result">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <?php foreach($columns as $column): ?>
                    <th><?= $column ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>

            <tbody id="search-table-body">
                <?php foreach($viewEntries as $entry): ?>
                <tr>
                    <?php foreach($columns as $column): ?>
                    <td><?=$entry[$column]?></td>
                    <?php endforeach; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
