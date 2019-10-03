<div class="row">
<div class="col-md-2">
<div class="list-group">
    <?= $this->Html->link(__('Edit Participant'), ['action' => 'edit', $participant->id], ['class' => 'list-group-item list-group-item-action']) ?>
    <?= $this->Form->postLink(__('Delete Participant'), ['action' => 'delete', $participant->id], ['class' => 'list-group-item list-group-item-action', 'confirm' => __('Are you sure you want to delete # {0}?', $participant->id)]) ?>
    <?= $this->Html->link(__('List Participants'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
    <?= $this->Html->link(__('New Participant'), ['action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
</div>
</div>

<div class="col-md-10">
    
<div class="card border-secondary mb-3" style="max-width: 78rem;">
  <div class="card-header"><h3><?= h($participant->id) ?></h3></div>
  <div class="card-body text-secondary">
    <h5 class="card-title">Details</h5>
    <p class="card-text">
    <table class="table">
        <tr>
            <th><?= __('Fullname') ?></th>
            <td><?= h($participant->fullname) ?></td>
        </tr>
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($participant->code) ?></td>
        </tr>
    </table>
    </p>
  </div>
</div>
    
    <div class="related">
        <h4><?= __('Competitions') ?></h4>
        <?php if (!empty($participant->perfomances)): ?>
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Challenge') ?></th>
                <th><?= __('Net Wpm') ?></th>
                <th><?= __('Gross Wpm') ?></th>
                <th><?= __('Accuracy') ?></th>
                <th><?= __('Correct Words') ?></th>
                <th><?= __('Incorrect Words') ?></th>
                <th><?= __('Seconds') ?></th>
                <th><?= __('Is Time Out') ?></th>
                <th><?= __('Created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($participant->perfomances as $perfomances): ?>
            <tr>
                <td><?= h($perfomances->id) ?></td>
                <td><?= h($perfomances->challenge->title) ?></td>
                <td><?= h($perfomances->net_wpm) ?></td>
                <td><?= h($perfomances->gross_wpm) ?></td>
                <td><?= h($perfomances->accuracy) ?></td>
                <td><?= h($perfomances->correct_words) ?></td>
                <td><?= h($perfomances->incorrect_words) ?></td>
                <td><?= h($perfomances->seconds) ?></td>
                <td>
                    <?php if($perfomances->is_time_out == 1):?>
                        <b class="badge badge-danger">Yes</b>
                    <?php else: ?>    
                        <b class="badge badge-success">No</b>
                    <?php endif;?>
                </td>
                <td><?= h($perfomances->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Perfomances', 'action' => 'view', $perfomances->id], ['class' => 'badge badge-light']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
</div>
</div>
