<?php echo $this->Html->script(array('/config_admin/js/jquery.js','/config_admin/js/required.js')); ?>
<div class="form">
    <?php echo $this->Form->create();?>
	<fieldset>
		<legend><?php echo __('Select Field Type'); ?></legend><br/>
		<table class="table table-bordered table-striped">
			<tr>
				<td>Select Field </td>
				<td><?php echo $this->Form->input('field', array('options'=> $editable_fields,'label' => false,'div'=>false)); ?></td>
				<td><?php echo $this->Form->submit(__('Get Values'),array('name' => 'field_submit'));?></td>
			</tr>
		</table>
	</fieldset>
    <? if(!empty($values)): ?>
    <script>
        var values = <?= json_encode($values) ?>;
    </script>
	<fieldset>
		<legend><?php echo __('Update Values'); ?></legend><br/>
		<table class="table table-bordered table-striped" style="width:400px;">
			<tr>
				<td> <?= __('Code') ?>
                </td>
				<td> <?= $editable_fields[$this->request->data['field']] ?> 
                    <?= $this->Form->input('selected_field', array('type' => 'hidden', 'value' => $this->request->data['field'])) ?>
                </td>
			</tr>
            <? foreach($values as $key => $value) : ?>
			<tr>
				<td><?= $key ?></td>
				<td><?php echo $this->Form->input("values.$key", array('label' => '','value' => $value)); ?></td>
			</tr>
            <? endforeach; ?>
			<tr id="tr_footer">
                <td></td>
				<td><center> 
                		<?php echo $this->Html->link('Add','#', array('id' => 'btn_add')); ?>
                </center></td>
			</tr>
			<tr>
                <td></td>
				<td><center>
                    <?php echo $this->Form->submit(__('Save Changes'),array('class'=>'btn btn-success', 'name' => 'list_submit', 'div' => false));?>
                </center></td>
			</tr>
		</table>
	</fieldset>
    <? endif; ?>
    <?php echo $this->Form->end(); ?>
</div>

