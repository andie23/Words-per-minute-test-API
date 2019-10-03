<div class="row">
<div class="col-md-2">
<div class="list-group">
    <?= $this->Html->link(__('Edit Challenge'), ['action' => 'edit', $challenge->id], ['class' => 'list-group-item list-group-item-action']) ?>
    <?= $this->Form->postLink(__('Delete Challenge'), ['action' => 'delete', $challenge->id], ['class' => 'list-group-item list-group-item-action', 'confirm' => __('Are you sure you want to delete # {0}?', $challenge->id)]) ?>
    <?= $this->Html->link(__('List Challenges'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
    <?= $this->Html->link(__('New Challenge'), ['action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
        <?= $this->Html->link(__('List Perfomances'), ['controller' => 'Perfomances', 'action' => 'index'],['class' => 'list-group-item list-group-item-action']) ?>
        <?= $this->Html->link(__('New Perfomance'), ['controller' => 'Perfomances', 'action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
</div>
</div>

<div class="col-md-10">
  <h4 class="card-title"><?= $challenge->title ?></h4>
  <div class="card">
    <div class="card-body">
        <p class="card-text"><div class="scrollable"><?= $this->Text->autoParagraph(h($challenge->paragraph)); ?></div></p>
    </div>
   </div>
  <p/>

     <div class="related">
        <h4><?= __('ScoreBoard') ?></h4>
        <?php if (!empty($perfomances)): ?>
        <table class="table text-center">
            <tr>
                <th><?= __('Points') ?></th>
                <th><?= __('Participant') ?></th>
                <th><?= __('Words Per Minute') ?></th>
                <th><?= __('Accuracy') ?></th>
                <th><?= __('Errors') ?></th>
                <th><?= __('Minutes') ?></th>
                <th><?= __('Timeout') ?></th>
                <th> Actions </th>
            </tr>
            <?php foreach ($perfomances as $perfomance): ?>
            <tr>
                <td><?= h((int) $perfomance->score) ?></td>
                <td><?= h($perfomance->participant) ?></td>
                <td><?= h((int) $perfomance->wpm) ?></td>
                <td><?= h((int) $perfomance->accuracy) ?></td>
                <td><?= h((int) $perfomance->errors) ?></td>
                <td><?= h($perfomance->minutes) ?></td>
                <td><?= $perfomance->timeout == 1 ? '<b class="badge badge-danger"> Yes </b>' : '<b class="badge badge-success">No</b>' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller'=>'Perfomances', 'action' => 'view', $perfomance->id], ['class'=> 'badge badge-light'])?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>    
</div>
</div>
</div>
