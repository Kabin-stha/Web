<?php
include "./services/transactionServices/readSingleTransaction.php";
ob_start();
?>

<form
    action="./services/transactionServices/updateTransaction.php<?php echo isset($transaction_id) ? '?transaction_id='.$transaction_id:'';?>"
    method="post">
    <label style="display: block;" for="">DR/CR</label>
    <input style="display: block; margin-bottom: 10px;" type="text" name="is_debit_or_credit"
        value="<?php echo ($transaction['is_debit_or_credit']) ?>">

    <label style="display: block;" for="">Amount</label>
    <input style="display: block; margin-bottom: 10px;" type="number" name="amount"
        value="<?php echo ($transaction['amount']) ?>">

    <label style="display: block;" for="">Ledger ID</label>
    <input disabled style="display: block; margin-bottom: 10px;" type="number" name="ledger_id"
        value="<?php echo ($transaction['ledger_id']) ?>">
    <button class="btn btn-success" type="submit">Submit</button>
</form>

<?php
 $content = ob_get_clean();
include 'layout.php';
?>