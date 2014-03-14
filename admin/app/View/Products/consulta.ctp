
<?php foreach ($subcategories as $sc): ?>
    <?php foreach ($sc as $s): ?>
        <option value="<?php echo $s['id']; ?>"><?php echo $s['nombre']; ?></option>
    <?php endforeach; ?>
<?php endforeach; ?>
<?php /*pr($s); */?>