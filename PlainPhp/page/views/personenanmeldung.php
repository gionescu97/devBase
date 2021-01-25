<div class="modal" tabindex="-1" role="dialog" id="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="modal-text"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="modal-yes" data-dismiss="modal">Ja</button>
        <button type="button" class="btn btn-danger" id="modal-no" data-dismiss="modal">Nein</button>
      </div>
    </div>
  </div>
</div>
<div class="alert" role="alert" id="alert" style="display: none;"></div>
<div class="card">
    <div class="card-body">
        <h2 class="card-title">Personenanmeldung</h2>
        <form method="POST" id="form">
            <h1></h1>
            <!-- ##################################### -->
            <!--                Names                  -->
            <!-- ##################################### -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Vorname</span>
                </div>
                <input type="text" class="form-control" name="vorname">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Nachname</span>
                </div>
                <input type="text" class="form-control" name="nachname">
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
                        <input class="form-check-input" type="radio" name="jobs" id="jobs<?= $job->job_id ?>" value="<?= $job->job_id ?>">
                        <label class="form-check-label" for="jobs<?= $job->job_id ?>"><?= $job->job_name ?></label>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>

            <!-- ##################################### -->
            <!--                Schools                -->
            <!-- ##################################### -->
            <div class="input-group">
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Schule</th>
                            <th>Lehrberuf</th>
                        </tr>
                    </thead>

                    <tbody>
                         <?php foreach($this->db['bs']->getSchulen(true) as $schule): ?>
                        <tr>
                            <td><input class="form-check-inout form-control" type="radio" name="schools" id="school<?= $schule->bs_id?>" value="<?= $schule->bs_id?>"></td>
                            <td class="align-middle"><?= $schule->bs_name ?></td>
                            <td>
                                <select class="form-control" name="lb_<?=$schule->bs_id?>">
                                    <?php foreach($this->db['bs']->getLehrberufeBySchule($schule->bs_id) as $lb): ?>
                                    <option value="<?= $lb->lb_id ?>"><?= $lb->lb_kurz ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                     <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <button type="submit" class="btn btn-outline-primary">Speichern</button>
        </form>
    </div>
</div>