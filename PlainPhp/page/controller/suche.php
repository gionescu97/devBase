<?php
    $postBody = file_get_contents('php://input');
    $data = json_decode($postBody);
    
    $searchString = $_POST['searchString'];
    $postKeys = array_keys($_POST);
    $jobs = [];
    foreach($postKeys as $entry) {
        if(substr($entry, 0, 4) === "job_") {
            array_push($jobs, substr($entry, 4));
        }
    }

    $searchResult = $this->db['bs']->doPersonSearch($searchString, $jobs);
    $this->shareData('SEARCH_RESULT', $searchResult);
    $this->loadMain();
