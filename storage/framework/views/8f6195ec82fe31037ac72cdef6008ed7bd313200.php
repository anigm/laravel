<div class="form-group">
    <?php echo Form::label('title', 'Title:'); ?>

    <?php echo Form::text('title', null, [ 'class' => 'form-control', 'autofocus' => true ]); ?>

    <?php echo $errors->first('title'); ?>

</div>
<div class="form-group">
    <?php echo Form::label('parent_id', 'Parent:'); ?>

    <?php echo Form::select('parent_id', $columns, null, [ 'class' => 'form-control' ]); ?>

    <?php echo $errors->first('parent_id'); ?>

</div>