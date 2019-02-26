<select name="month" class="form-control" >
<?php
    for ($i = 1; $i <= 12; ++$i){
        $time = strtotime(sprintf('+%d months', $i));
        $label = date('F ', $time);
        $value = date('m', $time);
        echo '<option value="'.$value.'" ';
        if((isset($_GET['month']))&&($value==$_GET['month']))echo 'selected';// Check if form submitted or not. select the month if yes
        echo '>'.$label.'</option>';
    }
?>
</select>
<select name="year" class="form-control">
<?php
    for ($i = 0; $i <= 12; ++$i){
        $time = strtotime(sprintf('-%d years', $i));
        $value = date('Y', $time);
        echo '<option value="'.$value.'" ';
        if((isset($_GET['year']))&&($value==$_GET['year']))echo 'selected';// Check if form submitted or not. select the year if yes
        echo '>'.$value.'</option>';
    }
?>
</select>