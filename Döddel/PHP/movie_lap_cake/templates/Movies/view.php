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
            <h3><?= h($movie->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($movie->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($movie->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Releasedate') ?></th>
                    <td><?= h($movie->releasedate) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Movies Has Productionfirms') ?></h4>
                <?php if (!empty($movie->movies_has_productionfirms)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Movie Id') ?></th>
                            <th><?= __('Productionfirm Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($movie->movies_has_productionfirms as $moviesHasProductionfirms) : ?>
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
