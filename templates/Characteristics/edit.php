<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Characteristic $characteristic
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $characteristic->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $characteristic->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Characteristics'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="characteristics form content">
            <?= $this->Form->create($characteristic) ?>
            <fieldset>
                <legend><?= __('Edit Characteristic') ?></legend>
                <?php
                    echo $this->Form->control('characteristic');
                    echo $this->Form->control('users._ids', ['options' => $users]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
