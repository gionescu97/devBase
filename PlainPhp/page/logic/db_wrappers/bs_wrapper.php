<?php
require_once('base_wrapper.php');

class BsDbWrapper extends DbWrapper {
    function getJobs() {
        $res = $this->dbCon->query('select * from job');
        return $res;
    }

    function doPersonSearch($searchStr, $jobs) {
        $baseQuery = 'select * from person natural join bs natural join job where INSTR(pe_nname, ?)';
        if(sizeof($jobs) > 0) {
            $questionmarks = str_replace(' ', ', ', trim(implode(' ', str_split(str_repeat('?', sizeof($jobs))))));
            $baseQuery .= " and job_id in($questionmarks)";
            return $this->dbCon->query($baseQuery, array_merge([$searchStr], $jobs));
        }
        return $this->dbCon->query($baseQuery, $searchStr);
    }

    function personExists($vorname, $nachname) {
        $personFetch = $this->dbCon->query('
            select * from person where vorname = ? and nachname = ?
        ', [$vorname, $nachname]);
        $len = sizeof($personFetch);
        return sizeof($personFetch) > 0;
    }

    function addNewPerson($vorname, $nachname, $jobId, $bs_id, $lb_id) {
        $this->dbCon->query('
            insert into person(pe_vname, pe_nname, job_id) values(?, ?, ?)
        ', [$vorname, $nachname, $jobId]);

        $pe_id = $this->dbCon->lastInsertId();
        $this->dbCon->query('
            insert into person_lehrberuf(pe_id, bs_id, lb_id, pele_von, pele_bis) values(?, ?, ?, ?, ?)
        ', [$pe_id, $bs_id, $lb_id, date('Y-m-d'), date('Y-m-d', strtotime('+4 years'))]);
        $err = $this->dbCon->getError();
    }

    function getSchulen($ignoreEmpty = false) {
        if($ignoreEmpty) {
            return $this->dbCon->query('select bs_id, 
                                               CONCAT(bs_zusatz, \' \', bs_ort) as "bs_name",
                                               bs_ort,
                                               bs_zusatz as "bs_bezeichnung"
                                          from bs b
                                         where exists(select 1 from bs_lehrberuf bl where b.bs_id = bl.bs_id)
                                         order by bs_ort, bs_zusatz');
        } else {
            return $this->dbCon->query('select bs_id, 
                                               CONCAT(bs_zusatz, \' \', bs_ort) as "bs_name",
                                               bs_ort,
                                               bs_zusatz as "bs_bezeichnung"
                                          from bs order by bs_ort, bs_zusatz');
        }
    }

    function getLehrberufeBySchule($bs_id) {
        $res = $this->dbCon->query('select * from bs_lehrberuf natural join lehrberuf where bs_id = ?', [$bs_id]);
        return $res;
    }

    function view1() {
        return $this->dbCon->query('
            select count as "Anzahl",
                   CONCAT(bs_zusatz, " ", bs_ort) as "Berufsschule"
              from (select count(*) as "count",
                           bs_id
                      from bs_lehrberuf
                     group by bs_id) a
           natural join bs b', [1], PDO::FETCH_ASSOC);
    }

    function view2() {
        return $this->dbCon->query('select CONCAT(pe_vname, \' \', pe_nname) as "Person" 
                                      from person p
                                     where not exists(select 1 
                                                        from person_lehrberuf pl
                                                       where p.pe_id = pl.pe_id)', [1], PDO::FETCH_ASSOC);
    }

    function view3() {
        return $this->dbCon->query('select CONCAT(bs_zusatz, \' \', bs_ort) as "Berufsschule"
                                      from bs a
                                     where exists(select 1
                                                    from person_lehrberuf
                                                   where bs_id = a.bs_id
                                                   group by bs_id
                                                  having count(pe_id) > 2)', [1], PDO::FETCH_ASSOC);
    }
}
