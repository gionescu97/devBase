<?php
    $postBody = file_get_contents('php://input');
    $data = json_decode($postBody);

    $vorname = $_POST['firstName'];
    $nachname = $_POST['lastName'];
    $jobId = $_POST['job'];
    $bs_id = $_POST['school'];
    $lb_id = $_POST["apprenticeship"];
    $ignoreExisting = $_POST['ignore_existing'];

    $errmsg = [];
    if(!isset($bs_id)) {
        array_push($errmsg, "Ungültige Berufsschule gewählt!");
    }

    if(!isset($jobId)){
        array_push($errmsg, "Ungültigen Job gewählt!");
    }

    $exists = $this->db['bs']->personExists($vorname, $nachname);
    if($ignoreExisting === "false" && !$exists) {
        $this->shareData('SUCCESS', false);
        $this->shareData('MODAL', ['Person existiert bereits!', "Ersetzen?"]);
        $this->shareData('MODAL_TITLE', "Achtung!");
    } else if(sizeof($errmsg) === 0) {
        $this->shareData('SUCCESS', true);
        $this->db['bs']->addNewPerson($vorname, $nachname, $jobId, $bs_id, $lb_id);
        $this->shareData('ALERT', 'Neue Person erfolgreich hinzugefügt! ');
        $this->shareData('ALERT_TYPE', 'alert-success');
    } else {
        $this->shareData('SUCCESS', false);
        $this->shareData('ALERT', implode("<br>", $errmsg));
        $this->shareData('ALERT_TYPE', 'alert-danger');
    }

    $json = json_encode($this->sharedData);
    echo $json;
