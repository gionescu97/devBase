<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diseasearea $diseasearea
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Diseasearea'), ['action' => 'edit', $diseasearea->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Diseasearea'), ['action' => 'delete', $diseasearea->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diseasearea->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Diseaseareas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Diseasearea'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="diseaseareas view content">
            <h3><?= h($diseasearea->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($diseasearea->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($diseasearea->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Diagnoses') ?></h4>
                <?php if (!empty($diseasearea->diagnoses)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Diseasearea Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($diseasearea->diagnoses as $diagnoses) : ?>
                        <tr>
                            <td><?= h($diagnoses->id) ?></td>
                            <td><?= h($diagnoses->title) ?></td>
                            <td><?= h($diagnoses->diseasearea_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Diagnoses', 'action' => 'view', $diagnoses->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Diagnoses', 'action' => 'edit', $diagnoses->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Diagnoses', 'action' => 'delete', $diagnoses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diagnoses->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
