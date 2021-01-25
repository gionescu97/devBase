<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Person'), ['action' => 'edit', $person->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Person'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Persons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Person'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="persons view content">
            <h3><?= h($person->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Fname') ?></th>
                    <td><?= h($person->fname) ?></td>
                </tr>
                <tr>
                    <th><?= __('SecName') ?></th>
                    <td><?= h($person->secName) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lname') ?></th>
                    <td><?= h($person->lname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($person->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Actors Movies') ?></h4>
                <?php if (!empty($person->actors_movies)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Movie Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($person->actors_movies as $actorsMovies) : ?>
                        <tr>
                            <td><?= h($actorsMovies->id) ?></td>
                            <td><?= h($actorsMovies->movie_id) ?></td>
                            <td><?= h($actorsMovies->person_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ActorsMovies', 'action' => 'view', $actorsMovies->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ActorsMovies', 'action' => 'edit', $actorsMovies->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ActorsMovies', 'action' => 'delete', $actorsMovies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actorsMovies->id)]) ?>
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
