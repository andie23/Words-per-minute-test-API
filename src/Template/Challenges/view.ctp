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
    
<div class="card border-secondary mb-3" style="max-width: 78rem;">
  <div class="card-header"><h3><?= h($challenge->id) ?></h3></div>
  <div class="card-body text-secondary">
    <h5 class="card-title">Details</h5>
    <p class="card-text">
    <table class="table">
                                        <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($challenge->title) ?></td>
                </tr>
                                                        <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($challenge->id) ?></td>
                </tr>
                        <tr>
                    <th><?= __('Time Limit') ?></th>
                    <td><?= $this->Number->format($challenge->time_limit) ?></td>
                </tr>
                        <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= $this->Number->format($challenge->created_by) ?></td>
                </tr>
                                                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($challenge->created) ?></td>
                </tr>
                        <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($challenge->modified) ?></td>
                </tr>
                                                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $challenge->is_active ? __('Yes') : __('No'); ?></td>
                </tr>
                    </table>
    </p>
  </div>
</div>
    
    <div class="card" style="width: 58rem;">
    <div class="card-body">
        <h5 class="card-title"><?= __('Paragraph') ?></h5>
        <p class="card-text"><?= $this->Text->autoParagraph(h($challenge->paragraph)); ?></p>
    </div>
    </div>
    <div class="related">
        <h4><?= __('Related Perfomances') ?></h4>
        <?php if (!empty($challenge->perfomances)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Challenge Id') ?></th>
                <th><?= __('Participant Id') ?></th>
                <th><?= __('Net Wpm') ?></th>
                <th><?= __('Gross Wpm') ?></th>
                <th><?= __('Accuracy') ?></th>
                <th><?= __('Correct Words') ?></th>
                <th><?= __('Incorrect Words') ?></th>
                <th><?= __('Typed List') ?></th>
                <th><?= __('Mistake List') ?></th>
                <th><?= __('Minutes') ?></th>
                <th><?= __('Is Time Out') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($challenge->perfomances as $perfomances): ?>
            <tr>
                <td><?= h($perfomances->id) ?></td>
                <td><?= h($perfomances->challenge_id) ?></td>
                <td><?= h($perfomances->participant_id) ?></td>
                <td><?= h($perfomances->net_wpm) ?></td>
                <td><?= h($perfomances->gross_wpm) ?></td>
                <td><?= h($perfomances->accuracy) ?></td>
                <td><?= h($perfomances->correct_words) ?></td>
                <td><?= h($perfomances->incorrect_words) ?></td>
                <td><?= h($perfomances->typed_list) ?></td>
                <td><?= h($perfomances->mistake_list) ?></td>
                <td><?= h($perfomances->minutes) ?></td>
                <td><?= h($perfomances->is_time_out) ?></td>
                <td><?= h($perfomances->created) ?></td>
                <td><?= h($perfomances->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Perfomances', 'action' => 'view', $perfomances->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Perfomances', 'action' => 'edit', $perfomances->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Perfomances', 'action' => 'delete', $perfomances->id], ['confirm' => __('Are you sure you want to delete # {0}?', $perfomances->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
</div>
</div>
