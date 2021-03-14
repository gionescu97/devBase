<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Roomrequest $roomrequest
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="roomrequests form content">
            <?= $this->Form->create($roomrequest) ?>
            <fieldset>
                <legend><?= __('Add Roomrequest') ?></legend>
                <?php
                    echo $this->Form->control('title_id', ['options' => $titles]);
                    echo $this->Form->control('gender_id', ['options' => $genders]);
                    echo $this->Form->control('fname', ['label' => 'First Name']);
                    echo $this->Form->control('lname', ['label' => 'Last Name']);
                    echo $this->Form->control('email');
                    echo $this->Form->control('arrival');
                    echo $this->Form->control('nights_stayed');
                    echo $this->Form->control('special_request');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
