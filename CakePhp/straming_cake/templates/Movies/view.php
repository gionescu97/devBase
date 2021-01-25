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
                    <th><?= __('Category') ?></th>
                    <td><?= $movie->has('category') ? $this->Html->link($movie->category->title, ['controller' => 'Categories', 'action' => 'view', $movie->category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Textshort') ?></th>
                    <td><?= h($movie->textshort) ?></td>
                </tr>
                <tr>
                    <th><?= __('Textlong') ?></th>
                    <td><?= h($movie->textlong) ?></td>
                </tr>
                <tr>
                    <th><?= __('Picture Url') ?></th>
                    <td><?= h($movie->picture_url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($movie->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Supplier Movies') ?></h4>
                <?php if (!empty($movie->supplier_movies)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Supplier Id') ?></th>
                            <th><?= __('Movie Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($movie->supplier_movies as $supplierMovies) : ?>
                        <tr>
                            <td><?= h($supplierMovies->id) ?></td>
                            <td><?= h($supplierMovies->supplier_id) ?></td>
                            <td><?= h($supplierMovies->movie_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'SupplierMovies', 'action' => 'view', $supplierMovies->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'SupplierMovies', 'action' => 'edit', $supplierMovies->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SupplierMovies', 'action' => 'delete', $supplierMovies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplierMovies->id)]) ?>
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
