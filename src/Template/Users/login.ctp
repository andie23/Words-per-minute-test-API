<div class="row justify-content-center">
    <div class="col-sm-6 col-md-6">
        <div class="card"> 
                <div class="card-header">
                    <?= $this->Html->image('logo.png') ?> <b> Login </b></div>
                    <div class="card-body">
                    <div class="p-3 mb-2 bg-danger text-white"><b>ATTENTION:</b> This portal is for administration purposes only</div>
                    <?= $this->Form->create('', ['controller' => 'Users', 'action' => 'login']) ?>
                    <?php
                        echo "<div class='form-group'>";
                        echo $this->Form->input('username', ['class'=> 'form-control', 'placeholder' => 'Your username',]);
                        echo "</div>";
                        echo "<div class='form-group'>";
                        echo $this->Form->input('password', ['class'=> 'form-control', 'placeholder' => 'Your password',]);
                        echo "</div>";
                    ?>
                    <?= $this->Form->button(__('Login'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?> 
                </div>    
                </div>  
                <p/>
        </div>
    </div>
</div>