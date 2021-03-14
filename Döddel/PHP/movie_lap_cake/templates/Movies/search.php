<div class="movies index content">
    
    <?= $this->Form->create() ?>
            <fieldset>
                <?php
                    echo $this->Form->control('search_string', ['div' => false, 'label' => false, 'placeholder' => 'search']);
                    echo $this->Form->control('Search', ['class' => 'button float-right', 'type' => 'submit', 'div' => false])
                ?>
            </fieldset>
        <?= $this->Form->end() ?>
        <?= $this->Html->link(__('New Movie'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('releasedate') ?></th>
                  
                </tr>
            </thead>
            <tbody>
                <?php foreach ($movies as $movie): ?>
                <tr>
                    <td><?= $this->Number->format($movie->id) ?></td>
                    <td><?= h($movie->title) ?></td>
                    <td><?= h($movie->releasedate) ?></td>
                   
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>