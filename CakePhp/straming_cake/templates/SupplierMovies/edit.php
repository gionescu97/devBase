<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SupplierMovie $supplierMovie
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $supplierMovie->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $supplierMovie->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Supplier Movies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="supplierMovies form content">
            <?= $this->Form->create($supplierMovie) ?>
            <fieldset>
                <legend><?= __('Edit Supplier Movie') ?></legend>
                <?php
                    echo $this->Form->control('supplier_id', ['options' => $suppliers]);
                    echo $this->Form->control('movie_id', ['options' => $movies]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
