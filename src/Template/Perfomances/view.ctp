<div class="row">
<div class="col-md-2">
<div class="list-group">
    <?= $this->Html->link(__('Edit Perfomance'), ['action' => 'edit', $perfomance->id], ['class' => 'list-group-item list-group-item-action']) ?>
    <?= $this->Form->postLink(__('Delete Perfomance'), ['action' => 'delete', $perfomance->id], ['class' => 'list-group-item list-group-item-action', 'confirm' => __('Are you sure you want to delete # {0}?', $perfomance->id)]) ?>
    <?= $this->Html->link(__('List Perfomances'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
    <?= $this->Html->link(__('New Perfomance'), ['action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
        <?= $this->Html->link(__('List Challenges'), ['controller' => 'Challenges', 'action' => 'index'],['class' => 'list-group-item list-group-item-action']) ?>
        <?= $this->Html->link(__('New Challenge'), ['controller' => 'Challenges', 'action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
        <?= $this->Html->link(__('List Participants'), ['controller' => 'Participants', 'action' => 'index'],['class' => 'list-group-item list-group-item-action']) ?>
        <?= $this->Html->link(__('New Participant'), ['controller' => 'Participants', 'action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
</div>
</div>

<div class="col-md-10">
    
<div class="card border-secondary mb-3" style="max-width: 78rem;">
  <div class="card-header"><h3><?= h($perfomance->id) ?></h3></div>
  <div class="card-body text-secondary">
    <h5 class="card-title">Details</h5>
    <p class="card-text">
    <table class="table">
                                        <tr>
                    <th><?= __('Challenge') ?></th>
                    <td><?= $perfomance->has('challenge') ? $this->Html->link($perfomance->challenge->id, ['controller' => 'Challenges', 'action' => 'view', $perfomance->challenge->id]) : '' ?></td>
                </tr>
                                        <tr>
                    <th><?= __('Participant') ?></th>
                    <td><?= $perfomance->has('participant') ? $this->Html->link($perfomance->participant->id, ['controller' => 'Participants', 'action' => 'view', $perfomance->participant->id]) : '' ?></td>
                </tr>
                                                        <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($perfomance->id) ?></td>
                </tr>
                        <tr>
                    <th><?= __('Net Wpm') ?></th>
                    <td><?= $this->Number->format($perfomance->net_wpm) ?></td>
                </tr>
                        <tr>
                    <th><?= __('Gross Wpm') ?></th>
                    <td><?= $this->Number->format($perfomance->gross_wpm) ?></td>
                </tr>
                        <tr>
                    <th><?= __('Accuracy') ?></th>
                    <td><?= $this->Number->format($perfomance->accuracy) ?></td>
                </tr>
                        <tr>
                    <th><?= __('Correct Words') ?></th>
                    <td><?= $this->Number->format($perfomance->correct_words) ?></td>
                </tr>
                        <tr>
                    <th><?= __('Incorrect Words') ?></th>
                    <td><?= $this->Number->format($perfomance->incorrect_words) ?></td>
                </tr>
                        <tr>
                    <th><?= __('Minutes') ?></th>
                    <td><?= $this->Number->format($perfomance->minutes) ?></td>
                </tr>
                                                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($perfomance->created) ?></td>
                </tr>
                        <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($perfomance->modified) ?></td>
                </tr>
                                                <tr>
                    <th><?= __('Is Time Out') ?></th>
                    <td><?= $perfomance->is_time_out ? __('Yes') : __('No'); ?></td>
                </tr>
                    </table>
    </p>
  </div>
</div>
    
    <div class="card" style="width: 58rem;">
    <div class="card-body">
        <h5 class="card-title"><?= __('Typed List') ?></h5>
        <p class="card-text"><?= $this->Text->autoParagraph(h($perfomance->typed_list)); ?></p>
    </div>
    </div>
    <div class="card" style="width: 58rem;">
    <div class="card-body">
        <h5 class="card-title"><?= __('Mistake List') ?></h5>
        <p class="card-text"><?= $this->Text->autoParagraph(h($perfomance->mistake_list)); ?></p>
    </div>
    </div>
</div>
</div>
</div>
