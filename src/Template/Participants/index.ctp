
<div class="row">
<div class="col-md-2">
<div class="list-group">
  <?= $this->Html->link(__('New Participant'), ['action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
</div>
</div>
<div class="col-md-10">
    <div class="card" width=100?>
    <h5 class="card-header"><?= __('Participants') ?></h5>
    <div class="card-body">
    <table class="table" >
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('code') ?></th>
                <th><?= $this->Paginator->sort('fullname') ?></th>
                <th class="actions"><?= __('Options') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($participants as $participant): ?>
            <tr>
                <td><?= $this->Number->format($participant->id) ?></td>
                <td><?= h($participant->code) ?></td>
                <td><?= h($participant->fullname) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Details'), ['action' => 'view', $participant->id], ['class'=>'badge badge-light']) ?>
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

