<div class="row">
<div class="col-md-2">
<div class="list-group">
        <?= $this->Html->link(__('List Challenges'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?></li>
        <?= $this->Html->link(__('List Perfomances'), ['controller' => 'Perfomances', 'action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>

        <?= $this->Html->link(__('New Perfomance'), ['controller' => 'Perfomances', 'action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>

</div>
</div>
<div class="col-md-10">   
    <?= $this->Form->create($challenge) ?>
    <div class="card">
    <h5 class="card-header"> <?= __('Add Challenge') ?></h5>
    <div class="card-body">
        <?php
            echo "<div class='form-group'>";
            echo $this->Form->input('title', ['class'=> 'form-control', 'placeholder' => 'Title',]);
            echo "</div>";
            echo "<div class='form-group'>";
            echo $this->Form->input('paragraph', ['class'=> 'form-control', 'placeholder' => 'Paragraph',]);
            echo "</div>";
            echo "<div class='form-group'>";
            echo $this->Form->input('time_limit', ['value'=>'1', 'class'=> 'form-control', 'placeholder' => 'Time limit in minutes',]);
            echo "</div>";
            echo "<p/>";
            echo "<div class='form-group'>";
            echo $this->Form->input('is_active', ['class'=> 'form-control', 'placeholder' => 'is_active']);
            echo "</div>";
            echo $this->Form->hidden('created_by', ['value'=>$user['id']]);
        ?>
    <p/>
    <?= $this->Form->button(__('Create'),['class' => 'btn btn-outline-primary']) ?>
    <?= $this->Form->end() ?> 
    </div>
</div>
</div>
</div>
