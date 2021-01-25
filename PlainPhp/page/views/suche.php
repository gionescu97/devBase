<div class="card">
    <div class="card-body">
        <h2 class="card-title">Suche</h2>
        <form method="POST" id="form">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        Nachname
                    </div>
                </div>
                <input type="text" class="form-control" id="searchString" name="searchString">
            </div>      
        
            <!-- ##################################### -->
            <!--                Jobs                   -->
            <!-- ##################################### -->
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Jobs</span>
                </div>
                <div class="form-control" style="height: 100%; display: grid; padding-left: 10px">
                <?php foreach($this->db['bs']->getJobs() as $job): ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="job_<?= $job->job_id ?>" id="jobs<?= $job->job_id ?>" value="<?= $job->job_id ?>" checked>
                        <label class="form-check-label" for="jobs<?= $job->job_id ?>"><?= $job->job_name ?></label>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>

            <div class="input-group">
                <button type="submit" class="btn btn-primary">Suchen</button>
            </div>
        </form>
    </div>
</div>

<?php if($this->dataExists('SEARCH_RESULT')) { ?>
<div class="card" id="search-result">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Berufsschule</th>
                    <th>Beruf</th>
                    <th>Name</th>
                </tr>
            </thead>

            <tbody id="search-table-body">
                <?php foreach($this->getSharedData('SEARCH_RESULT') as $entry): ?>
                <tr>
                    <td><?=$entry->bs_zusatz?> <?=$entry->bs_ort?></td>
                    <td><?=$entry->job_name?></td>
                    <td><?=$entry->pe_vname?> <?=$entry->pe_nname?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php } ?>
