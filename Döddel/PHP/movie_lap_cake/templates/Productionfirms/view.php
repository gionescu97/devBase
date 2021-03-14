<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Productionfirm $productionfirm
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Productionfirm'), ['action' => 'edit', $productionfirm->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Productionfirm'), ['action' => 'delete', $productionfirm->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productionfirm->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Productionfirms'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Productionfirm'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productionfirms view content">
            <h3><?= h($productionfirm->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($productionfirm->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($productionfirm->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Movies Has Productionfirms') ?></h4>
                <?php if (!empty($productionfirm->movies_has_productionfirms)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Movie Id') ?></th>
                            <th><?= __('Productionfirm Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($productionfirm->movies_has_productionfirms as $moviesHasProductionfirms) : ?>
                        <tr>
                            <td><?= h($moviesHasProductionfirms->movie_id) ?></td>
                            <td><?= h($moviesHasProductionfirms->productionfirm_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'MoviesHasProductionfirms', 'action' => 'view', $moviesHasProductionfirms->]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'MoviesHasProductionfirms', 'action' => 'edit', $moviesHasProductionfirms->]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'MoviesHasProductionfirms', 'action' => 'delete', $moviesHasProductionfirms->], ['confirm' => __('Are you sure you want to delete # {0}?', $moviesHasProductionfirms->)]) ?>
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
