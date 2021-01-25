<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="articles form content">
            <?= $this->Form->create() ?>
            <fieldset>
                <legend><?= __('Search Article') ?></legend>
                <?php
                echo $this->Form->control('body');
                echo $this->Form->control('type_id', ['options' => $types, 'empty' => '(auswählen)']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Search')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<?php if (!empty($articles)) : ?>
<div class="row">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('slug') ?></th>
                    <th><?= $this->Paginator->sort('body') ?></th>
                    <th><?= $this->Paginator->sort('published') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('type_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article) : ?>
                    <tr>
                        <td><?= $this->Number->format($article->id) ?></td>
                        <td><?= $article->has('user') ? $this->Html->link($article->user->id, ['controller' => 'Users', 'action' => 'view', $article->user->id]) : '' ?></td>
                        <td><?= h($article->title) ?></td>
                        <td><?= h($article->slug) ?></td>
                        <td><?= h($article->body) ?></td>
                        <td><?= h($article->published) ?></td>
                        <td><?= h($article->created) ?></td>
                        <td><?= h($article->modified) ?></td>
                        <td><?= $article->has('type') ? $this->Html->link($article->type->title, ['controller' => 'Types', 'action' => 'view', $article->type->id]) : '' ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $article->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $article->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php endif; ?>