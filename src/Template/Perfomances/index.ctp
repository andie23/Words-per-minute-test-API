
<div class="row">
<div class="col-md-2">
<div class="list-group">
  <?= $this->Html->link(__('New Perfomance'), ['action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Html->link(__('List Challenges'), ['controller' => 'Challenges', 'action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
            <?= $this->Html->link(__('New Challenge'), ['controller' => 'Challenges', 'action' => 'add'] , ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Html->link(__('List Participants'), ['controller' => 'Participants', 'action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
            <?= $this->Html->link(__('New Participant'), ['controller' => 'Participants', 'action' => 'add'] , ['class' => 'list-group-item list-group-item-action']) ?>
    </div>
</div>
<div class="col-md-10">
    <div class="card" width=100?>
    <h5 class="card-header"><?= __('Perfomances') ?></h5>
    <div class="card-body">
    <table class="table" >
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('challenge_id') ?></th>
                <th><?= $this->Paginator->sort('participant_id') ?></th>
                <th><?= $this->Paginator->sort('net_wpm') ?></th>
                <th><?= $this->Paginator->sort('gross_wpm') ?></th>
                <th><?= $this->Paginator->sort('accuracy') ?></th>
                <th><?= $this->Paginator->sort('correct_words') ?></th>
                <th class="actions"><?= __('Options') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($perfomances as $perfomance): ?>
            <tr>
                <td><?= $this->Number->format($perfomance->id) ?></td>
                <td><?= $perfomance->has('challenge') ? $this->Html->link($perfomance->challenge->id, ['controller' => 'Challenges', 'action' => 'view', $perfomance->challenge->id]) : '' ?></td>
                <td><?= $perfomance->has('participant') ? $this->Html->link($perfomance->participant->id, ['controller' => 'Participants', 'action' => 'view', $perfomance->participant->id]) : '' ?></td>
                <td><?= $this->Number->format($perfomance->net_wpm) ?></td>
                <td><?= $this->Number->format($perfomance->gross_wpm) ?></td>
                <td><?= $this->Number->format($perfomance->accuracy) ?></td>
                <td><?= $this->Number->format($perfomance->correct_words) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Details'), ['action' => 'view', $perfomance->id]) ?>
                    <?= $this->Html->link(__('Modify'), ['action' => 'edit', $perfomance->id]) ?>
                    <?= $this->Form->postLink(__('Remove'), ['action' => 'delete', $perfomance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $perfomance->id)]) ?>
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

