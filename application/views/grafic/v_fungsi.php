<select class="form-control" name="fungsi">
    <option value="">Pilih Fungsi</option>
    <?php
        foreach ($fungsi as $value) {
            ?>
            <option value="<?php echo $value->id; ?>"><?php echo $value->fungsi; ?></option>
            <?php
        }
    ?>
</select>