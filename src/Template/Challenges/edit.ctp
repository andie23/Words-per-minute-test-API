<div class="row">
<div class="col-md-2">
<div class="list-group">
       <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $challenge->id],
                ['class' => 'list-group-item list-group-item-action', 'confirm' => __('Are you sure you want to delete # {0}?', $challenge->id)],
                []
            )
        ?>
        <?= $this->Html->link(__('List Challenges'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?></li>
        <?= $this->Html->link(__('List Perfomances'), ['controller' => 'Perfomances', 'action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>

        <?= $this->Html->link(__('New Perfomance'), ['controller' => 'Perfomances', 'action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>

</div>
</div>
<div class="col-md-10">   
    <?= $this->Form->create($challenge) ?>
    <div class="card">
    <h5 class="card-header"> <?= __('Edit Challenge') ?></h5>
    <div class="card-body">
        <?php
            echo "<div class='form-group'>";
            echo $this->Form->input('time_limit', ['class'=> 'form-control', 'placeholder' => 'time_limit',]);
            echo "</div>";
            echo "<div class='form-group'>";
            echo $this->Form->input('paragraph', ['class'=> 'form-control', 'placeholder' => 'paragraph',]);
            echo "</div>";
            echo "<div class='form-group'>";
            echo $this->Form->input('is_active', ['class'=> 'form-control', 'placeholder' => 'is_active',]);
            echo "</div>";
            echo "<div class='form-group'>";
            echo $this->Form->input('created_by', ['class'=> 'form-control', 'placeholder' => 'created_by',]);
            echo "</div>";
            echo "<div class='form-group'>";
            echo $this->Form->input('title', ['class'=> 'form-control', 'placeholder' => 'title',]);
            echo "</div>";
        ?>
    <p/>
    <?= $this->Form->button(__('Submit'),['class' => 'btn btn-outline-danger']) ?>
    <?= $this->Form->end() ?> 
    </div>
</div>
</div>
</div>
