<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Filme $filme
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Filme'), ['action' => 'edit', $filme->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Filme'), ['action' => 'delete', $filme->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filme->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Filme'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Filme'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="filme view content">
            <h3><?= h($filme->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($filme->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Kategorien') ?></th>
                    <td><?= $filme->has('kategorien') ? $this->Html->link($filme->kategorien->title, ['controller' => 'Kategorien', 'action' => 'view', $filme->kategorien->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Kurztext') ?></th>
                    <td><?= h($filme->kurztext) ?></td>
                </tr>
                <tr>
                    <th><?= __('Langtext') ?></th>
                    <td><?= h($filme->langtext) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bild Url') ?></th>
                    <td><?= h($filme->bild_url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($filme->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Anbieter') ?></h4>
                <?php if (!empty($filme->anbieter)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Url') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($filme->anbieter as $anbieter) : ?>
                        <tr>
                            <td><?= h($anbieter->id) ?></td>
                            <td><?= h($anbieter->title) ?></td>
                            <td><?= h($anbieter->url) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Anbieter', 'action' => 'view', $anbieter->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Anbieter', 'action' => 'edit', $anbieter->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Anbieter', 'action' => 'delete', $anbieter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $anbieter->id)]) ?>
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
