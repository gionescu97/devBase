<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie $movie
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Movie'), ['action' => 'edit', $movie->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Movie'), ['action' => 'delete', $movie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movie->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Movies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Movie'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="movies view content">
            <h3><?= h($movie->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title 1') ?></th>
                    <td><?= h($movie->title_1) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title 2') ?></th>
                    <td><?= h($movie->title_2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Genere') ?></th>
                    <td><?= $movie->has('genere') ? $this->Html->link($movie->genere->name, ['controller' => 'Generes', 'action' => 'view', $movie->genere->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($movie->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Premiere') ?></th>
                    <td><?= h($movie->premiere) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Actors Movies') ?></h4>
                <?php if (!empty($movie->actors_movies)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Movie Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($movie->actors_movies as $actorsMovies) : ?>
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
            <div class="related">
                <h4><?= __('Related Director Movies') ?></h4>
                <?php if (!empty($movie->director_movies)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Movie Id') ?></th>
                            <th><?= __('Persons Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($movie->director_movies as $directorMovies) : ?>
                        <tr>
                            <td><?= h($directorMovies->id) ?></td>
                            <td><?= h($directorMovies->movie_id) ?></td>
                            <td><?= h($directorMovies->persons_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'DirectorMovies', 'action' => 'view', $directorMovies->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'DirectorMovies', 'action' => 'edit', $directorMovies->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'DirectorMovies', 'action' => 'delete', $directorMovies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $directorMovies->id)]) ?>
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
