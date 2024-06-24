<?php
include "./services/ledgerServices/readSingleLedger.php";
ob_start();
?>

<form action="./services/ledgerServices/updateLedger.php<?php echo isset($ledger_id) ? '?ledger_id='.$ledger_id:'';?>"
    method="post">
    <label style="display: block;" for="">Ledger Name </label>
    <input style="display: block; margin-bottom: 10px;" type="text" name="entity"
        value="<?php echo ($ledger['entity']) ?>">
    <button class="btn btn-success" type="submit">Submit</button>
</form>

<?php
 $content = ob_get_clean();
include 'layout.php';
?>