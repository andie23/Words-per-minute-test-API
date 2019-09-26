
<div class="row">
<div class="col-md-2">
<div class="list-group">
  <?= $this->Html->link(__('New Challenge'), ['action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Html->link(__('List Perfomances'), ['controller' => 'Perfomances', 'action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
            <?= $this->Html->link(__('New Perfomance'), ['controller' => 'Perfomances', 'action' => 'add'] , ['class' => 'list-group-item list-group-item-action']) ?>
    </div>
</div>
<div class="col-md-10">
    <div class="card" width=100?>
    <h5 class="card-header"><?= __('Challenges') ?></h5>
    <div class="card-body">
    <table class="table" >
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('time_limit') ?></th>
                <th><?= $this->Paginator->sort('is_active') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Options') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($challenges as $challenge): ?>
            <tr>
                <td><?= $this->Number->format($challenge->id) ?></td>
                <td><?= h($challenge->title) ?></td>
                <td><?= $this->Number->format($challenge->time_limit) ?> Minute(s)</td>
                <td><?= h($challenge->is_active) ?></td>
                <td><?= h($challenge->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Details'), ['action' => 'view', $challenge->id]) ?>
                    <?= $this->Html->link(__('Modify'), ['action' => 'edit', $challenge->id]) ?>
                    <?= $this->Form->postLink(__('Remove'), ['action' => 'delete', $challenge->id], ['confirm' => __('Are you sure you want to delete # {0}?', $challenge->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <div class="pagination">
        <ul class="pagination">
            <?= $this->Paginator->prev(__('<< Previous ')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__(' Next >>')) ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
</div>
</div>
</div>

