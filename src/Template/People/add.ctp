<!DOCTYPE html>
<?=$this->Form->create($entity,
    ['type'=>'post','url'=>['controller'=>'people','action'=>'create']])?>

<div>name</div>
<div><?=$this->Form->text('People.name') ?></div>
<div>mail</div>
<div><?=$this->Form->text('People.mail') ?></div>
<div>age</div>
<div><?=$this->Form->text('People.age') ?></div>


<div><?=$this->Form->submit('submit') ?></div>

<?=$this->Form->end() ?>







)>
