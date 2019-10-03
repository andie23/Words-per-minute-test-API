<?php if($entity->is_active == 1): ?>
    <?= $this->Html->link('Deactivate', ['action'=>'deactivate', $entity->id], ['class'=>'badge badge-danger'])?>
<?php else: ?>
    <?= $this->Html->link('Activate', ['action'=>'activate', $entity->id], ['class'=>'badge badge-primary'])?>
<?php endif;?>