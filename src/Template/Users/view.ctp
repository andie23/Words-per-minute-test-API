<div class="row">
<div class="col-md-2">
<div class="list-group">
    <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'list-group-item list-group-item-action']) ?>
    <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['class' => 'list-group-item list-group-item-action', 'confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
    <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
</div>
</div>

<div class="col-md-10">
    
<div class="card border-secondary mb-3" style="max-width: 78rem;">
  <div class="card-header"><h3><?= h($user->username) ?></h3></div>
  <div class="card-body text-secondary">
    <h5 class="card-title">Details</h5>
    <p class="card-text">
    <table class="table">
                                        <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                                        <tr>
                    <th><?= __('Fullname') ?></th>
                    <td><?= h($user->fullname) ?></td>
                </tr>
                                        <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                                        <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($user->phone) ?></td>
                </tr>
                                                        <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                        <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= $this->Number->format($user->created_by) ?></td>
                </tr>
                                                <tr>
                    <th><?= __('Last Login') ?></th>
                    <td><?= h($user->last_login) ?></td>
                </tr>
                        <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                        <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
                            </table>
    </p>
  </div>
</div>
</div>
</div>
</div>
