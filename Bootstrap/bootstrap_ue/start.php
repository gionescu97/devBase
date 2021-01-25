<!-- Gabriel Ionescu, 11.01.2021-->
<?php
if (isset($_POST['save']))
{
    try 
    {
        $vname = $_POST['vname'];
        $nname = $_POST['nname'];
        $job = $_POST['job'];
        $query = 'insert into persons (first_name, last_name, job_id) values(?,?,?)';
        $stmt = $con->perpare($query);
        $stmt->execute([$vname, $nname, $job]);

        echo $vname.' '.$nname.' erfolgreich gespeichert!';
    }
    catch (Exception $e)
    {
        echo 'BlahBlah';
    }
    
}
else 
{
    ?>
    <form method="post">
        <div class="form-group">
            <label class="col-sm-2" for="vn">Vorname:</label>
            <input class="col-sm-5" type="text" id="vn" name="vname" placeholder="z.B. Max" required>
            
        </div>
        <div class="from-group">
            <label class="col-sm-2" for="nn">Nachname:</label>
            <input class="col-sm-5" type="text" id="nn" name="nname" placeholder="z.B. Mustermann" required>
        </div>
    <?php
    echo '</form>';
}