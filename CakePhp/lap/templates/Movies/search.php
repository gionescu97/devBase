<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie $movie
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="movies index content">
            <?= $this->Form->create() ?>
            <fieldset>
                <legend><?= __('Suche nach Filmen in einem bestimmten Zeitraum') ?></legend>
                <?php
                    echo $this->Form->control('date_from', ['type' => 'date']);
                    echo $this->Form->control('date_to', ['type' => 'date']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Suche')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<?php if (!empty($movies)): ?>
<div class="row">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('generes_id', 'Genere') ?></th>
                    <th><?= $this->Paginator->sort('title_1', 'Filmtitel') ?></th>
                    <th><?= $this->Paginator->sort('premiere', 'Jahr') ?></th>
                    <th><?= $this->Paginator->sort('premiere', 'Regie') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($movies as $movie): ?>
                <tr>
                    <td><?= $movie->has('genere') ? $this->Html->link($movie->genere->name, ['controller' => 'Generes', 'action' => 'view', $movie->genere->id]) : '' ?></td>
                    <td><?= h($movie->title_1) ?></td>
                    <td><?= h($movie->premiere->year) ?></td>
                    <td>
                    <?php foreach ($movie->directors_movies as $director): ?>
                    <?= h($director->person->fname.' '.$director->person->lname) ?><br>
                    <?php endforeach; ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $movie->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $movie->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $movie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movie->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php endif; ?>