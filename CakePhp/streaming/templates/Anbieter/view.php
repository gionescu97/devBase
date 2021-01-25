<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Anbieter $anbieter
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Anbieter'), ['action' => 'edit', $anbieter->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Anbieter'), ['action' => 'delete', $anbieter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $anbieter->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Anbieter'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Anbieter'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="anbieter view content">
            <h3><?= h($anbieter->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($anbieter->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Url') ?></th>
                    <td><?= h($anbieter->url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($anbieter->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Filme') ?></h4>
                <?php if (!empty($anbieter->filme)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Kategorie Id') ?></th>
                            <th><?= __('Kurztext') ?></th>
                            <th><?= __('Langtext') ?></th>
                            <th><?= __('Bild Url') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($anbieter->filme as $filme) : ?>
                        <tr>
                            <td><?= h($filme->id) ?></td>
                            <td><?= h($filme->title) ?></td>
                            <td><?= h($filme->kategorie_id) ?></td>
                            <td><?= h($filme->kurztext) ?></td>
                            <td><?= h($filme->langtext) ?></td>
                            <td><?= h($filme->bild_url) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Filme', 'action' => 'view', $filme->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Filme', 'action' => 'edit', $filme->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Filme', 'action' => 'delete', $filme->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filme->id)]) ?>
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
